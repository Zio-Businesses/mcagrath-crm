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
use App\DataTables\VendorTrackDataTable;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewVendorContract;
use Illuminate\Support\Facades\DB;
class LeadVendorController extends AccountBaseController
{
    public function handle()
    {

        $this->pageTitle = __('modules.leadContact.createTitlev');
         $this->view = 'lead-contact.ajax.createvendor';

        if (request()->ajax()) {
            return $this->returnAjax($this->view);
       
        }

        return view('lead-contact.create', $this->data);
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
            $leadContact->contract_start=companyToYmd($request->start_date);
            $leadContact->contract_end=companyToYmd($request->end_date);
            $leadContact->v_status='wip';
            $leadContact->created_by=user()->name;
            $leadContact->save();
            Notification::route('mail', $email)->notify(new NewVendorContract($leadContact->id));
            
        }
        else{
            $leadContact = new Vendor();
            $leadContact->vendor_name = $request->vendor_name;
            $leadContact->vendor_email = $request->vendor_email;
            $leadContact->vendor_number = $request->vendor_mobile;
            $leadContact->contract_start=companyToYmd($request->start_date);
            $leadContact->contract_end=companyToYmd($request->end_date);
            $leadContact->v_status='email_not_send';
            $leadContact->created_by=user()->name;
            $leadContact->save();
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
        $this->vendor = Vendor::where('id', '=', $id)->first();
        $this->pageTitle = __('app.update') . ' ' . __('Vendor');

        $this->view = 'vendortrack.ajax.edit';

        if (request()->ajax()) {
            return $this->returnAjax($this->view);
        }

        return view('vendortrack.create', $this->data);

    }
    public function update(Request $request, $id)
    {
        $v_date = Vendor::find($id);
    
        DB::table('vendors')
        ->where('id', $id)
        ->update([
        
            'vendor_name' => $request->vendor_name,
            'vendor_email'=>$request->vendor_email,
            'vendor_number'=>$request->vendor_number,
            'contract_start'=>$v_date->contract_start==$request->contract_start? $request->contract_start:companyToYmd($request->contract_start),
            'contract_end'=>$v_date->contract_end==$request->contract_end? $request->contract_end:companyToYmd($request->contract_end),
            
        ]);
        $redirectUrl = route('vendortrack.index');
        return Reply::successWithData(__('messages.updateSuccess'), ['redirectUrl' => $redirectUrl]);
    }
    public function proposal($id)
    {
        Log::info($id);
    }
}
