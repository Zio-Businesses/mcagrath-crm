<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Carbon;
use Carbon\Carbon;

use App\Models\Role;
use App\Helper\Reply;
use App\Models\Leave;

use App\Models\Holiday;
use App\Models\Attendance;
use Endroid\QrCode\QrCode;
use Illuminate\Http\Request;
use App\Models\EmployeeShift;
use Endroid\QrCode\Logo\Logo;
// use Endroid\QrCode\QrCode;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use App\Models\AttendanceSetting;
use Illuminate\Support\Facades\DB;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Auth;
use App\Models\EmployeeShiftSchedule;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\ErrorCorrectionLevel;
use App\Http\Requests\AttendanceSetting\UpdateAttendanceSetting;

class AttendanceSettingController extends AccountBaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'app.menu.attendanceSettings';
        $this->activeSettingMenu = 'attendance_settings';
        $this->middleware(function ($request, $next) {

            abort_403(!(user()->permission('manage_attendance_setting') == 'all' && in_array('attendance', user_modules())));

            return $next($request);
        });
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->ipAddresses = [];
        $this->attendanceSetting = AttendanceSetting::first();
        $this->monthlyReportRoles = json_decode($this->attendanceSetting->monthly_report_roles);
        $this->roles = Role::where('name', '<>', 'client')->get();

        if (json_decode($this->attendanceSetting->ip_address)) {
            $this->ipAddresses = json_decode($this->attendanceSetting->ip_address, true);
        }

        $tab = request('tab');
        // dd($tab);
        switch ($tab) {
        case 'shift':
            $this->weekMap = Holiday::weekMap();
            $this->employeeShifts = EmployeeShift::where('shift_name', '<>', 'Day Off')->get();
            $this->view = 'attendance-settings.ajax.shift';
            break;

        case 'qrcode':


            $this->qr = Builder::create()
                ->writer(new PngWriter())
                ->encoding(new Encoding('UTF-8'))
                ->data((route('settings.qr-login')))
                ->errorCorrectionLevel(ErrorCorrectionLevel::High)
                ->size(300)
                ->margin(10)
                ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
                ->validateResult(false)
                ->build();



            $this->view = 'attendance-settings.ajax.qrcode';
        break;

        default:
            $this->view = 'attendance-settings.ajax.attendance';
            break;
        }

        $this->activeTab = $tab ?: 'attendance';

        if (request()->ajax()) {
            $html = view($this->view, $this->data)->render();

            return Reply::dataOnly(['status' => 'success', 'html' => $html, 'title' => $this->pageTitle, 'activeTab' => $this->activeTab]);
        }

        return view('attendance-settings.index', $this->data);
    }

    /**
     * @param UpdateAttendanceSetting $request
     * @param int $id
     * @return array
     * @throws \Froiden\RestAPI\Exceptions\RelatedResourceNotFoundException
     */
    //phpcs:ignore
    public function update(UpdateAttendanceSetting $request, $id)
    {
        $setting = company()->attendanceSetting;
        $setting->employee_clock_in_out = ($request->employee_clock_in_out == 'yes') ? 'yes' : 'no';
        $setting->radius_check = ($request->radius_check == 'yes') ? 'yes' : 'no';
        $setting->ip_check = ($request->ip_check == 'yes') ? 'yes' : 'no';
        $setting->radius = $request->radius;
        $setting->ip_address = json_encode($request->ip);
        $setting->alert_after = $request->alert_after;
        $setting->week_start_from = $request->week_start_from;
        $setting->alert_after_status = ($request->alert_after_status == 'on') ? 1 : 0;
        $setting->save_current_location = ($request->save_current_location) ? 1 : 0;
        $setting->allow_shift_change = ($request->allow_shift_change) ? 1 : 0;
        $setting->auto_clock_in = ($request->auto_clock_in) ? 'yes' : 'no';
        $setting->show_clock_in_button = ($request->show_clock_in_button == 'yes') ? 'yes' : 'no';
        $setting->auto_clock_in_location = $request->auto_clock_in_location;
        $setting->monthly_report = ($request->monthly_report) ? 1 : 0;
        $setting->monthly_report_roles = json_encode($request->monthly_report_roles);
        $setting->save();

        session()->forget(['attendance_setting','company']);

        return Reply::success(__('messages.updateSuccess'));
    }

    // public function qrindex()
    // {
    //  return view('qrcode.index');
    // }

    // public function qrCodeStatus(Request $request)
    // {

    //     $attendanceSetting = AttendanceSetting::first();
    //     $attendanceSetting->qr_enable = $request->qr_status ;
    //     $attendanceSetting->save();

    //     return Reply::success('Success');
    // }

    // public function qrClockInOut(Request $request)
    // {

    //     // Check if the user is authenticated
    //     if (!Auth::check()) {
    //         return redirect()->route('login')->with('info', 'Please log in to clock in.');
    //     }

    //     // Retrieve the authenticated user
    //     $user = Auth::user();

    //     // Check if the user is already clocked in for today
    //     $todayAttendance = Attendance::where('user_id', $user->id)
    //                                   ->whereDate('clock_in_time', Carbon::today())
    //                                   ->whereNull('clock_out_time')
    //                                   ->first();

    //                                   //   return
    //     if ($todayAttendance) {
    //         // User is already clocked in, so clock them out
    //         $this->clockOutUser($todayAttendance);
    //         return redirect()->route('dashboard')->with('success', __('messages.attendanceSaveSuccess'));
    //         //return view('dashboard.admin', $this->data);
    //     } else {
    //         // User is not clocked in for today, so clock them in
    //         $this->clockInUser($user,$request);
    //         return redirect()->route('dashboard')->with('success',__('messages.attendanceSaveSuccess'));
    //         // return view('dashboard.admin', $this->data);
    //     }
    // }

    // private function clockInUser($user, $request)
    // {
    //     $now = now();
    //     $showClockIn = AttendanceSetting::first();

    //     // Retrieve attendance settings
    //     $this->attendanceSettings = $this->attendanceShift($showClockIn);

    //     // Construct start and end timestamps
    //     $startTimestamp = $now->format('Y-m-d') . ' ' . $this->attendanceSettings->office_start_time;
    //     $endTimestamp = $now->format('Y-m-d') . ' ' . $this->attendanceSettings->office_end_time;

    //     // Check if the user can clock in
    //     if ($showClockIn->show_clock_in_button == 'yes') {
    //         $officeEndTime = $now;
    //     }

    //     // Adjust timestamps based on office start and end times
    //     $officeStartTime = Carbon::createFromFormat('Y-m-d H:i:s', $startTimestamp, $this->company->timezone)
    //         ->setTimezone('UTC');
    //     $officeEndTime = Carbon::createFromFormat('Y-m-d H:i:s', $endTimestamp, $this->company->timezone)
    //         ->setTimezone('UTC');
    //         $lateTime = $officeStartTime->addMinutes($this->attendanceSettings->late_mark_duration);
    //         $checkTodayAttendance = Attendance::where('user_id', $this->user->id)
    //         ->where(DB::raw('DATE(attendances.clock_in_time)'), '=', $now->format('Y-m-d'))->first();


    //     // Check if the user is allowed to clock in based on settings
    //     if ($showClockIn->employee_clock_in_out == 'yes') {
    //         // Check if it's too early to clock in
    //         if (is_null($this->attendanceSettings->early_clock_in) && !$now->between($officeStartTime, $officeEndTime) && $showClockIn->show_clock_in_button == 'no') {
    //             $this->cannotLogin = true;
    //         } else {
    //             $earlyClockIn = $now->copy()->addMinutes($this->attendanceSettings->early_clock_in)->setTimezone('UTC');
    //             if ($earlyClockIn->gte($officeStartTime) || $showClockIn->show_clock_in_button == 'yes') {
    //                 $this->cannotLogin = false;
    //             } else {
    //                 $this->cannotLogin = true;
    //             }
    //         }

    //         // Check if the user can clock in from previous day
    //         if ($this->cannotLogin && $now->betweenIncluded($officeStartTime->copy()->subDay(), $officeEndTime->copy()->subDay())) {
    //             $this->cannotLogin = false;
    //         }
    //     } else {
    //         $this->cannotLogin = true;
    //     }

    //     // Abort if user cannot login
    //     abort_if($this->cannotLogin, 403);

    //     // Check user by IP
    //     if (attendance_setting()->ip_check == 'yes') {
    //         $ips = (array) json_decode(attendance_setting()->ip_address);
    //         if (!in_array($request->ip(), $ips)) {
    //             return Reply::error(__('messages.notAnAuthorisedDevice'));
    //         }
    //     }

    //     // Check user by location
    //     if (attendance_setting()->radius_check == 'yes') {
    //         $checkRadius = $this->isWithinRadius($request);
    //         if (!$checkRadius) {
    //             return Reply::error(__('messages.notAnValidLocation'));
    //         }
    //     }

    //     // Check maximum attendance in a day
    //     $clockInCount = Attendance::getTotalUserClockInWithTime($officeStartTime, $officeEndTime, $user->id);

    //     if ($clockInCount >= $this->attendanceSettings->clockin_in_day) {
    //         return Reply::error(__('messages.maxClockin'));
    //     }

    //     // Save the attendance record
    //     $attendance = new Attendance();
    //     $attendance->user_id = $user->id;
    //     $attendance->clock_in_time = $now;
    //     $attendance->clock_in_ip = request()->ip();
    //     $attendance->location_id = $request->location;
    //     $attendance->work_from_type = 'office';
    //     // Add more attributes as necessary...
    //     if ($now->gt($lateTime)) {
    //         $attendance->late = 'yes';
    //     }

    //     $leave = Leave::where('leave_date', $attendance->clock_in_time->format('Y-m-d'))
    //         ->where('user_id', $this->user->id)->first();

    //     if (isset($leave) && !is_null($leave->half_day_type)) {
    //         $attendance->half_day = 'yes';
    //     }
    //     else {
    //         $attendance->half_day = 'no';
    //     }
    //     $currentTimestamp = $now->setTimezone('UTC');
    //     $currentTimestamp = $currentTimestamp->timestamp;;

    //     // Check day's first record and half day time
    //     if (
    //         !is_null($this->attendanceSettings->halfday_mark_time)
    //         && is_null($checkTodayAttendance)
    //         && isset($halfDayTimestamp)
    //         && ($currentTimestamp > $halfDayTimestamp)
    //         && ($showClockIn->show_clock_in_button == 'no')
    //     ) {
    //         $attendance->half_day = 'yes';
    //     }

    //     $currentLatitude = $request->currentLatitude;
    //     $currentLongitude = $request->currentLongitude;

    //     if ($currentLatitude != '' && $currentLongitude != '') {
    //         $attendance->latitude = $currentLatitude;
    //         $attendance->longitude = $currentLongitude;
    //     }

    //     $attendance->employee_shift_id = $this->attendanceSettings->id;

    //     $attendance->shift_start_time = $attendance->clock_in_time->toDateString() . ' ' . $this->attendanceSettings->office_start_time;

    //     if (Carbon::parse($this->attendanceSettings->office_start_time)->gt(Carbon::parse($this->attendanceSettings->office_end_time))) {
    //         $attendance->shift_end_time = $attendance->clock_in_time->addDay()->toDateString() . ' ' . $this->attendanceSettings->office_end_time;

    //     }
    //     else {
    //         $attendance->shift_end_time = $attendance->clock_in_time->toDateString() . ' ' . $this->attendanceSettings->office_end_time;
    //     }
    //     $attendance->save();

    //     return Reply::successWithData(__('messages.attendanceSaveSuccess'), [
    //         'time' => $now->format('h:i A'),
    //         'ip' => $attendance->clock_in_ip,
    //         'working_from' => $attendance->working_from
    //     ]);
    // }

    // private function clockOutUser($attendance)
    // {
    //     // Update clock-out time
    //     $attendance->update(['clock_out_time' => now()]);
    // }
    public function attendanceShift($defaultAttendanceSettings)
    {
        $checkPreviousDayShift = EmployeeShiftSchedule::with('shift')->where('user_id', user()->id)
            ->where('date', now(company()->timezone)->subDay()->toDateString())
            ->first();

        $checkTodayShift = EmployeeShiftSchedule::with('shift')->where('user_id', user()->id)
            ->where('date', now(company()->timezone)->toDateString())
            ->first();

        $backDayFromDefault = Carbon::parse(now(company()->timezone)->subDay()->format('Y-m-d') . ' ' . $defaultAttendanceSettings->office_start_time);

        $backDayToDefault = Carbon::parse(now(company()->timezone)->subDay()->format('Y-m-d') . ' ' . $defaultAttendanceSettings->office_end_time);

        if ($backDayFromDefault->gt($backDayToDefault)) {
            $backDayToDefault->addDay();
        }

        $nowTime = Carbon::createFromFormat('Y-m-d H:i:s', now(company()->timezone)->toDateTimeString(), 'UTC');

        if ($checkPreviousDayShift && $nowTime->betweenIncluded($checkPreviousDayShift->shift_start_time, $checkPreviousDayShift->shift_end_time)) {
            $attendanceSettings = $checkPreviousDayShift;

        }
        else if ($nowTime->betweenIncluded($backDayFromDefault, $backDayToDefault)) {
            $attendanceSettings = $defaultAttendanceSettings;

        }
        else if ($checkTodayShift &&
            ($nowTime->betweenIncluded($checkTodayShift->shift_start_time, $checkTodayShift->shift_end_time)
                || $nowTime->gt($checkTodayShift->shift_end_time)
                || (!$nowTime->betweenIncluded($checkTodayShift->shift_start_time, $checkTodayShift->shift_end_time) && $defaultAttendanceSettings->show_clock_in_button == 'no'))
        ) {
            $attendanceSettings = $checkTodayShift;
        }
        else if ($checkTodayShift && !is_null($checkTodayShift->shift->early_clock_in)) {
            $attendanceSettings = $checkTodayShift;
        }
        else {
            $attendanceSettings = $defaultAttendanceSettings;
        }

        return $attendanceSettings->shift;

    }

}
