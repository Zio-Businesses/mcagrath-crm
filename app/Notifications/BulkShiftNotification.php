<?php

namespace App\Notifications;

use App\Models\EmailNotificationSetting;
use App\Models\EmployeeShiftSchedule;
use App\Models\Event;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\OneSignal\OneSignalChannel;

class BulkShiftNotification extends BaseNotification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $userData;
    private $dateRange;
    private $emailSetting;
    private $userId;

    public function __construct(User $userData, $dateRange, $userId)
    {

        $this->userData = $userData;
        $this->dateRange = $dateRange;
        $this->userId = $userId;
        $this->company = $this->userData->company;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable):MailMessage
    {
        $build = parent::build();
        $employeeShifts = EmployeeShiftSchedule::with('shift')
            ->whereIn('date', $this->dateRange)
            ->where('user_id', $this->userId)
            ->get();

        return $build
            ->subject(__('email.shiftScheduled.subject'))
            ->markdown('mail.bulk-shift-email', [
                'employeeShifts' => $employeeShifts,
                'company' => $this->company,
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        // return $this->userData->toArray();
    }

}
