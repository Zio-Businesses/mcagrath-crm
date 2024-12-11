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
    

    protected $projectvendor,$from;
    /**
     * Create a new notification instance.
     */
    public function __construct($vproid,$by)
    {
        $this->company = Company::find(1);
        $this->projectvendor = $vproid;
        $this->from = $by;
        // $this->pdfsent =  $pdfgenerated;
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

    protected function castAttributeAsEncryptedString($key, $value)
    {
        return Crypt::encryptString($value);
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        $data = [
            'projectvendor' => $this->projectvendor,
        ];
        $encryptedData = $this->castAttributeAsEncryptedString('data', json_encode($data));
        $build = parent::build();
        $vpro = ProjectVendor::findOrFail($this->projectvendor);
        $pro = Project::with('propertyDetails')->findOrFail($vpro->project_id);
        if($this->from=='original')
        {
            $content = __('This is an Work Order Accpeted Notification') .' for Property Address - '. $pro->propertyDetails->property_address .'. Please click the download button below to get a copy.';
            $subject = 'Work Order Accepted';
        }
        else{
            $content = __('This is an Change Order Accpeted Notification') .' for Property Address - '. $pro->propertyDetails->property_address .'. Please click the download button below to get a copy.';
            $subject = 'Change Order Accepted';
        }
        // $filename = 'workorder-' . $vpro->id;
        // $pdfPath = storage_path($this->pdfsent);
        $url = url()->temporarySignedRoute('front.wo.download', now()->addDays(GlobalSetting::SIGNED_ROUTE_EXPIRY),[
            'data' => $encryptedData,
        ]);
        $url = getDomainSpecificUrl($url, $this->company);
        return $build
            ->subject(__($subject))
            ->markdown('mail.email', [
                'content'=>$content,
                'url' => $url,
                'themeColor' => $this->company->header_color,
                'actionText' => __('Download') . ' ' . __('PDF'),
                'notifiableName' => $vpro->vendor_name,
            ]);
            // ->attachData($pdfPath, $filename, [
            //     'mime' => 'application/pdf',
            // ]);
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