<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Leave;
use App\Services\Google;
use App\Events\LeaveEvent;
use App\Models\Attendance;
use App\Models\EmployeeActivity;
use App\Models\EmployeeLeaveQuota;
use App\Models\Notification;
use App\Models\GoogleCalendarModule;
use Google\Service\Exception;
use Google_Service_Calendar_Event;
use App\Traits\EmployeeActivityTrait;

class LeaveObserver
{


    use EmployeeActivityTrait;

    public function saving(Leave $leave)
    {
        if (!isRunningInConsoleOrSeeding()) {
            $leave->last_updated_by = user()->id;
        }
    }

    public function creating(Leave $leave)
    {
        if (!isRunningInConsoleOrSeeding()) {

            $leave->added_by = user()->id;
        }

        if (company()) {
            $leave->company_id = company()->id;
        }

        if ($leave->status == 'approved') {
            // Deduct leave quota
            $this->deductEmployeeLeaveQuota($leave);
        }

    }

    public function created(Leave $leave)
    {
        if (!isRunningInConsoleOrSeeding()) {
            if (user()) {
                self::createEmployeeActivity(user()->id, 'leave-created', $leave->id, 'leave');
            }
            
            if (request()->duration == 'multiple') {
                if (session()->has('leaves_duration')) {

                    event(new LeaveEvent($leave, 'created', request()->multi_date));
                }
            }
            else {
                event(new LeaveEvent($leave, 'created'));
            }

            /* Add google calendar event */
            if (!is_null($leave->leave_date) && !is_null($leave->user)) {
                $leave->event_id = $this->googleCalendarEvent($leave);
            }

        }
    }

    public function updating(Leave $leave)
    {
        if (!isRunningInConsoleOrSeeding()) {

            if ($leave->isDirty('status')) {
                $leave->approved_by = user()->id;
                $leave->approved_at = now()->toDateTimeString();

                if ($leave->status == 'approved') {
                    if ($leave->duration === 'half day') {
                        Attendance::whereDate('clock_in_time', $leave->leave_date)
                            ->where('user_id', $leave->user_id)
                            ->update(['half_day' => true]);
                    }
             
                    $this->deductEmployeeLeaveQuota($leave);
                }

                if ($leave->getOriginal('status') == 'approved' && $leave->status != 'approved') {
                    $this->incrementEmployeeLeaveQuota($leave);
                }
            }
        }
    }

    public function updated(Leave $leave)
    {
        if (!isRunningInConsoleOrSeeding()) {
            if (user()) {
                self::createEmployeeActivity(user()->id, 'leave-updated', $leave->id, 'leave');
            }
            
            if ($leave->isDirty('status')) {
                event(new LeaveEvent($leave, 'statusUpdated'));
                $leave->approved_by = user()->id;
                $leave->approved_at = now()->toDateTimeString();
            }
            else {
                event(new LeaveEvent($leave, 'updated'));
            }

            /* update google calendar event */
            if (!is_null($leave->leave_date) && !is_null($leave->user)) {
                $leave->event_id = $this->googleCalendarEvent($leave);
            }

        }
    }

    public function deleting(Leave $leave)
    {
        /* Start of deleting event from google calendar */
        $google = new Google();
        $googleAccount = company();

        if (company()->google_calendar_status == 'active' && $googleAccount->google_calendar_verification_status == 'verified' && $googleAccount->token) {
            $google->connectUsing($googleAccount->token);
            try {
                if ($leave->event_id) {
                    $google->service('Calendar')->events->delete('primary', $leave->event_id);
                }
            } catch (Exception $error) {
                if (is_null($error->getErrors())) {
                    // Delete google calendar connection data i.e. token, name, google_id
                    $googleAccount->name = null;
                    $googleAccount->token = null;
                    $googleAccount->google_id = null;
                    $googleAccount->google_calendar_verification_status = 'non_verified';
                    $googleAccount->save();
                }
            }
        }

        $notificationModel = ['App\Notifications\NewLeaveRequest', 'App\Notifications\LeaveApplication', 'App\Notifications\MultipleLeaveApplication',
            'App\Notifications\LeaveStatusApprove', 'App\Notifications\LeaveStatusUpdate', 'App\Notifications\LeaveStatusReject', 'App\Notifications\NewMultipleLeaveRequest'];
        Notification::whereIn('type', $notificationModel)
            ->whereNull('read_at')
            ->where(function ($q) use ($leave) {
                $q->where('data', 'like', '{"id":' . $leave->id . ',%');
                $q->orWhere('data', 'like', '%,"task_id":' . $leave->id . ',%');
            })->delete();

        /* End of deleting event from google calendar */

        $leave->files()->each(function ($file) {
            $file->delete();
        });

        if ($leave->status == 'approved') {
            $this->incrementEmployeeLeaveQuota($leave);
        }
    }

    public function deleted(Leave $leave)
    {
        if (user()) {
            self::createEmployeeActivity(user()->id, 'leave-deleted');

        }
    }

    protected function googleCalendarEvent($leave)
    {
        $module = GoogleCalendarModule::first();
        $googleAccount = company();

        if (company()->google_calendar_status == 'active' && $googleAccount->google_calendar_verification_status == 'verified' && $googleAccount->token && $module->leave_status == 1) {

            $google = new Google();
            $attendiesData = [];

            $user = User::where('id', $leave->user_id)->first();

            if ($user->google_calendar_status) {
                $attendiesData[] = ['email' => $user->email];
            }

            $description = $user->name . ' ' . __('app.leave');

            // Create event
            $google->connectUsing($googleAccount->token);

            $eventData = new Google_Service_Calendar_Event(array(
                'summary' => $user->name,
                'location' => ' ',
                'description' => $description,
                'colorId' => 6,
                'start' => array(
                    'dateTime' => $leave->leave_date,
                    'timeZone' => $googleAccount->timezone,
                ),
                'end' => array(
                    'dateTime' => $leave->leave_date,
                    'timeZone' => $googleAccount->timezone,
                ),
                'attendees' => $attendiesData,
                'reminders' => array(
                    'useDefault' => false,
                    'overrides' => array(
                        array('method' => 'email', 'minutes' => 24 * 60),
                        array('method' => 'popup', 'minutes' => 10),
                    ),
                ),
            ));

            try {
                if ($leave->event_id) {
                    $results = $google->service('Calendar')->events->patch('primary', $leave->event_id, $eventData);
                }
                else {
                    $results = $google->service('Calendar')->events->insert('primary', $eventData);
                }

                return $results->id;
            } catch (Exception $error) {
                if (is_null($error->getErrors())) {
                    // Delete google calendar connection data i.e. token, name, google_id
                    $googleAccount->name = null;
                    $googleAccount->token = null;
                    $googleAccount->google_id = null;
                    $googleAccount->google_calendar_verification_status = 'non_verified';
                    $googleAccount->save();
                }
            }
        }

        return $leave->event_id;
    }

    public function deductEmployeeLeaveQuota(Leave $leave)
    {
        $leaveQuota = EmployeeLeaveQuota::where('user_id', $leave->user_id)
        ->where('leave_type_id', $leave->leave_type_id)
        ->first();

        if ($leaveQuota) {
            $leaveDuration = $leave->duration == 'half day' ? 0.5 : 1;
            $leaveQuota->leaves_remaining = $leaveQuota->leaves_remaining - $leaveDuration;
            $leaveQuota->leaves_used = $leaveQuota->leaves_used + $leaveDuration;
            $leaveQuota->save();
        }
    }

    public function incrementEmployeeLeaveQuota(Leave $leave)
    {
        $leaveQuota = EmployeeLeaveQuota::where('user_id', $leave->user_id)
        ->where('leave_type_id', $leave->leave_type_id)
        ->first();

        if ($leaveQuota) {
            $leaveDuration = $leave->duration == 'half day' ? 0.5 : 1;
            $leaveQuota->leaves_remaining = $leaveQuota->leaves_remaining + $leaveDuration;
            $leaveQuota->leaves_used = $leaveQuota->leaves_used - $leaveDuration;
            $leaveQuota->save();
        }
    }

}
