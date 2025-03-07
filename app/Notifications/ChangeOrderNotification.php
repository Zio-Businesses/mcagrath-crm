<?php

namespace App\Notifications;


use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Company;
use App\Models\ProjectVendor;
use App\Models\Project;
use App\Models\GlobalSetting;
use Illuminate\Support\Facades\Crypt;

class ChangeOrderNotification extends BaseNotification
{
    

    protected $projectvendor,$projectid,$contractid,$vendorid;
    /**
     * Create a new notification instance.
     */
    public function __construct($vproid,$proid,$cid,$vid)
    {
        $this->company = Company::find(1);
        $this->projectvendor = $vproid;
        $this->projectid = $proid;
        $this->contractid = $cid;
        $this->vendorid = $vid;
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
            'projectid' => $this->projectid,
            'contractid' => $this->contractid,
            'vendorid'=> $this->vendorid
        ];
    
        $encryptedData = $this->castAttributeAsEncryptedString('data', json_encode($data));
        
        $build = parent::build();
        $vpro = ProjectVendor::findOrFail($this->projectvendor);
        $pro = Project::with('propertyDetails')->findOrFail($this->projectid);
        $url = $vpro->link;
        $content = __('This is an Change order notification') .' for Work Order # - '.$pro->project_short_code .' with Property Address - '. $pro->propertyDetails->property_address .'. please click below to review and "Accept/Reject" . If you have any questions, please call the office immediately.';
        
        return $build
            ->subject(__('Change Order Notification'))
            ->markdown('mail.email', [
                'content' => $content,
                'url' => $url,
                'themeColor' => $this->company->header_color,
                'actionText' => __('app.view') . ' ' . __('Change Order'),
                'notifiableName' => $vpro->vendor_name,
                'phone'=> $this->company->company_phone,
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