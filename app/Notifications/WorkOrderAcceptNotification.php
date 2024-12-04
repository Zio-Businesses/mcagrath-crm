<?php

namespace App\Notifications;


use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Company;
use App\Models\ProjectVendor;
use App\Models\Project;
use App\Models\GlobalSetting;
use Illuminate\Support\Facades\Crypt;

class WorkOrderAcceptNotification extends BaseNotification
{
    

    protected $projectvendor,$pdfsent;
    /**
     * Create a new notification instance.
     */
    public function __construct($vproid,$pdfgenerated)
    {
        $this->company = Company::find(1);
        $this->projectvendor = $vproid;
        $this->pdfsent =  $pdfgenerated;
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
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        
        
        $build = parent::build();
        $vpro = ProjectVendor::findOrFail($this->projectvendor);
        $pro = Project::with('propertyDetails')->findOrFail($vpro->project_id);
        $content = __('This is an Work Order Accpeted Notification') .' for Property Address - '. $pro->propertyDetails->property_address .'. Please find a copy of the accepted workorder below as an attachment';
        $filename = 'workorder-' . $vpro->id;
        $pdfPath = storage_path($this->pdfsent);
        return $build
            ->subject(__('Work Order Accepted'))
            ->markdown('mail.email', [
                'content'=>$content,
                'themeColor' => $this->company->header_color,
                'notifiableName' => $vpro->vendor_name,
                ])
                ->attach($pdfPath, [
                    'as' => $filename, // Custom file name for the attachment
                    'mime' => 'application/pdf',
                ]);
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