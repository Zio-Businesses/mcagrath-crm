<?php

namespace App\Notifications;


use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Company;
use App\Models\ProjectVendor;
use App\Models\GlobalSetting;
use Illuminate\Support\Facades\Crypt;

class NewVendorWorkOrder extends BaseNotification
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
        $url = url()->temporarySignedRoute('front.wo.show', now()->addDays(GlobalSetting::SIGNED_ROUTE_EXPIRY),[
            'data' => $encryptedData,
        ]);
        $url = getDomainSpecificUrl($url, $this->company);

        $vpro = ProjectVendor::findOrFail($this->projectvendor);
        $vpro->link=$url;
        $vpro->save();

        $content = __('A new work order has been created') . '<br>';

        return $build
            ->subject(__('Welcome to McGrath Consulting Contractor Network!'))
            ->markdown('mail.email', [
                'content' => $content,
                'url' => $url,
                'themeColor' => $this->company->header_color,
                'actionText' => __('app.view') . ' ' . __('Work Order'),
                'notifiableName' => $vpro->vendor_name,
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