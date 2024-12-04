<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Project\StoreChangeNotification;
use App\Helper\Reply;
use App\Models\VendorChangeNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\ProjectVendor;
use App\Notifications\ChangeOrderNotification;

class VendorChangeNotificationController extends Controller
{
    public function store(StoreChangeNotification $request)
    {
        $vcn = new VendorChangeNotification();
        $vcn->due_date=companyToYmd($request->due_date);
        $vcn->sow_id=$request->sow_id;
        $vcn->project_vendor_id=$request->vendor_id;
        $vcn->link_sent_by=user()->id;
        $vcn->project_amount=$request->project_amount;
        $vcn->add_notes=$request->add_notes;
        $vcn->project_type=$request->project_vendor_type;
        $vcn->link_status='Sent';
        $vcn->save();
        $vpro = ProjectVendor::where('id', $request->vendor_id)->select('id', 'project_id', 'vendor_email_address','contract_id','vendor_id')->firstOrFail();
        Notification::route('mail', $vpro->vendor_email_address)->notify(new ChangeOrderNotification($vpro->id,$vpro->project_id,$vpro->contract_id,$vpro->vendor_id));
        return Reply::success(__('Change Notification sent'));
    }
}
