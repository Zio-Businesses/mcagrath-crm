<?php

namespace App\Notifications;


use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Company;
use App\Models\GlobalSetting;

class NewVendorContract extends BaseNotification
{
    
    protected $name,$start_date,$end_date;
    /**
     * Create a new notification instance.
     */
    public function __construct($name,$start_date,$end_date)
    {
        $this->company= Company::find(1);
        $this->name=$name;
        $this->start_date=$start_date;
        $this->end_date=$end_date;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
       
        return ['mail'];
        // $via = ['database'];

        // if ($notifiable->email_notifications && $notifiable->email != '') {
        //     array_push($via, 'mail');
        // }

        // return $via;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        // 
        
        $build = parent::build();
        $url = url()->temporarySignedRoute('front.ota.show', now()->addDays(GlobalSetting::SIGNED_ROUTE_EXPIRY),[
            'startdate' =>  $this->start_date,
            'enddate' =>  $this->end_date,
            'name'=> $this->name
        ]);
        $url = getDomainSpecificUrl($url, $this->company);

        $content = __('email.newContract.text') . '<br>';

        return $build
            ->subject(__('email.newContract.subject'))
            ->markdown('mail.email', [
                'url' => $url,
                'content' => $content,
                'themeColor' => $this->company->header_color,
                'actionText' => __('app.view') . ' ' . __('app.menu.contract'),
                'notifiableName' => $this->name]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
