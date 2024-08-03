<?php

namespace App\Http\Controllers;

use App\Http\Requests\Lead\StoreVendorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Vendor;
use App\Models\VendorContract;
use App\Helper\Reply;
use App\Models\Project;
use App\Models\ContractType;
use App\Models\ClientDetails;
use App\Models\ClientCategory;
use App\Models\PurposeConsent;
use App\Models\LanguageSetting;
use App\Models\UniversalSearch;
use App\Models\ClientSubCategory;
use App\Models\PurposeConsentUser;
use Carbon\Carbon;
use App\DataTables\VendorTrackDataTable;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewVendorContract;
use Illuminate\Support\Facades\DB;
use App\Models\LeadSource;
use App\Models\NotesTitle;

class LeadVendorController extends AccountBaseController
{
    public function handle()
    {
        
        $this->pageTitle = __('modules.leadContact.createTitlev');
         $this->view = 'lead-contact.ajax.createvendor';
         $this->contracttype = VendorContract::getContractType();
         $this->leadsource=LeadSource::all();
        $this->notestitle=NotesTitle::all();
        if (request()->ajax()) {
            return $this->returnAjax($this->view);
       
        }

        return view('lead-contact.create', $this->data);
    }
    public function vendorcheck($email)
    {
        $users =Vendor::where('vendor_email', $email)->where('v_status', 'rejected')->exists();
       if($users){
            return Reply::dataOnly(['status' => 'success']);
        }
        else{
            return Reply::dataOnly(['status' => 'failed']);
        }
    }
    public function store(StoreVendorRequest $request)
    {
        $email = $request->input('vendor_email');
        if($request[1]==1)
        {
            $leadContact = new Vendor();
            $leadContact->vendor_name = $request->vendor_name;
            $leadContact->vendor_email = $request->vendor_email;
            $leadContact->vendor_number = $request->vendor_mobile;
            $leadContact->contract_start=Carbon::today()->format('Y-m-d');
            $leadContact->contract_end=Carbon::today()->addYear()->format('Y-m-d');
            $leadContact->v_status='work in progress';
            $leadContact->created_by=user()->name;
            $leadContact->save();
            Notification::route('mail', $email)->notify(new NewVendorContract($leadContact->id));
            $redirectUrl = route('lead-contact.index');
            return Reply::successWithData(__('Saved And Mail Send'), ['redirectUrl' => $redirectUrl]);
        }
        else{
            $leadContact = new Vendor();
            $leadContact->vendor_name = $request->vendor_name;
            $leadContact->vendor_email = $request->vendor_email;
            $leadContact->vendor_number = $request->vendor_mobile;
            $leadContact->contract_start=Carbon::today()->format('Y-m-d');
            $leadContact->contract_end=Carbon::today()->addYear()->format('Y-m-d');
            $leadContact->v_status='email not send';
            $leadContact->created_by=user()->name;
            $leadContact->save();
            $redirectUrl = route('lead-contact.index');
            return Reply::successWithData(__('Saved'), ['redirectUrl' => $redirectUrl]);
        }
    }
    public function index(VendorTrackDataTable $dataTable)
    {
        $this->pageTitle = 'Vendor Leads';
        // $viewPermission = user()->permission('view_clients');
        // $this->addClientPermission = user()->permission('add_clients');

        // abort_403(!in_array($viewPermission, ['all', 'added', 'both']));

        if (!request()->ajax()) {
            
            $this->subcategories = ClientSubCategory::all();
            $this->categories = ClientCategory::all();
            $this->projects = Project::all();
            $this->contracts = ContractType::all();
            $this->countries = countries();
            
        }

        return $dataTable->render('vendortrack.index', $this->data);
    }
    public function destroy($id)
    {
        $vendor = Vendor::find($id);

        if ($vendor) {
            // Delete the user
            $vendor->delete();

        }

        return Reply::success(__('messages.deleteSuccess'));
    }
    public function edit($id)
    {
        $this->contracttype = VendorContract::getContractType();
        $this->vendor = Vendor::where('id', '=', $id)->first();
        $this->pageTitle = __('app.update') . ' ' . __('Vendor');
        $this->vendorStatuses = Vendor::getStatuses();
        $this->leadsource=LeadSource::all(); 
        $this->view = 'vendortrack.ajax.edit';

        if (request()->ajax()) {
            return $this->returnAjax($this->view);
        }

        return view('vendortrack.create', $this->data);

    }
    public function update(StoreVendorRequest $request, $id)
    {
        $v_date = Vendor::find($id);
        DB::table('vendors')
        ->where('id', $id)
        ->update([
        
            'vendor_name' => $request->vendor_name,
            'vendor_email'=>$request->vendor_email,
            'vendor_number'=>$request->vendor_mobile,
            'contract_start'=>Carbon::today()->format('Y-m-d'),
            'contract_end'=>Carbon::today()->addYear()->format('Y-m-d'),
            'v_status'=>$request->v_status,
            
        ]);
        $redirectUrl = route('vendortrack.index');
        return Reply::successWithData(__('messages.updateSuccess'), ['redirectUrl' => $redirectUrl]);
    }
    public function proposal($id)
    {
        $send_email = Vendor::find($id);
        $send_email->v_status='work in progress';
        $send_email->save();
        Notification::route('mail', $send_email->vendor_email)->notify(new NewVendorContract($send_email->id));
        return Reply::success(__('Mail Send'));
    }
   
}
