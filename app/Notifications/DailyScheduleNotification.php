<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\EmailNotificationSetting;

class DailyScheduleNotification extends BaseNotification
{


    /**
     * Create a new notification instance.
     */

    private $userData;
    private $userId;
    private $userModules;
    private $emailSetting;

    public function __construct($userData)
    {
        $this->userData = $userData;
        $this->company = $this->userData['user']->company;
        $this->userModules = $this->userModules($this->userData['user']->id);
        $this->emailSetting = EmailNotificationSetting::where('company_id', $this->company->id)->where('slug', 'daily-schedule-notification')->first();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        $via = [];

        $modulesToCheck = ['tasks', 'events', 'holidays', 'leaves', 'recruit'];

        if (!empty(array_intersect($modulesToCheck, $this->userModules))) {
            if ($this->emailSetting->send_email == 'yes') {
                array_push($via, 'mail');
            }
        }

        return $via;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $build = parent::build();
        $url = getDomainSpecificUrl(route('dashboard'), $this->company);

        $content = __('email.dailyScheduleReminder.content') . ':<br>';

        if (in_array('tasks', $this->userModules)) {
            $content .= '<br>' . __('email.dailyScheduleReminder.taskText') . ': <a class="text-dark-grey text-decoration-none" href=' . $url . '> ' . $this->userData['tasks'] . '</a>';
        }

        if (in_array('events', $this->userModules)) {
            $content .= '<br>' . __('email.dailyScheduleReminder.eventText') . ': <a class="text-dark-grey" href=' . $url . '> ' . $this->userData['events'] . '</a>';
        }

        if (in_array('holidays', $this->userModules)) {
            $content .= '<br>' . __('email.dailyScheduleReminder.holidayText') . ': <a class="text-dark-grey" href=' . $url . '> ' . $this->userData['holidays'] . '</a>';
        }

        if (in_array('leaves', $this->userModules)) {
            $content .= '<br>' . __('email.dailyScheduleReminder.leavesText') . ': <a class="text-dark-grey text-decoration-none" href=' . $url . '> ' . $this->userData['leaves'] . '</a>';
        }

        if (module_enabled('Recruit') && in_array('recruit', $this->userModules)) {
            $content .= '<br>' . __('email.dailyScheduleReminder.interviewText') . ': <a class="text-dark-grey text-decoration-none" href=' . $url . '> ' . $this->userData['interview'] . '</a>';
        }

        return $build
            ->subject(__('email.dailyScheduleReminder.subject', ['date' => now()->format($this->company->date_format)]))
            ->markdown('mail.email', [
                'notifiableName' => $this->userData['user']->name,
                'content' => $content
            ]);
    }

    public function userModules($userId)
    {
        $userData = User::find($this->userData['user']->id);
        $roles = $userData->roles;
        $userRoles = $roles->pluck('name')->toArray();

        $module = new \App\Models\ModuleSetting();

        if (in_array('admin', $userRoles)) {
            $module = $module->where('type', 'admin');

        }
        elseif (in_array('employee', $userRoles)) {
            $module = $module->where('type', 'employee');
        }

        $module = $module->where('status', 'active');
        $module->select('module_name');

        $module = $module->get();
        $moduleArray = [];

        foreach ($module->toArray() as $item) {
            $moduleArray[] = array_values($item)[0];
        }

        return $moduleArray;

    }
}
