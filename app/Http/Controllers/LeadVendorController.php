<?php

namespace App\Http\Controllers;

use App\Http\Requests\Lead\StoreVendorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Vendor;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewContract;
class LeadVendorController extends AccountBaseController
{
    public function handle()
    {

        $this->pageTitle = __('modules.leadContact.createTitlev');

        // $this->addPermission = user()->permission('add_lead');
        // abort_403(!in_array($this->addPermission, ['all', 'added']));

        // if ($this->addPermission == 'all') {
        //     $this->employees = User::allEmployees();
        // }

        // $defaultStatus = LeadStatus::where('default', '1')->first();
        // $this->columnId = ((request('column_id') != '') ? request('column_id') : $defaultStatus->id);
        // $this->leadAgents = LeadAgent::with('user')->whereHas('user', function ($q) {
        //     $q->where('status', 'active');
        // })->get();

        // $this->leadAgentArray = $this->leadAgents->pluck('user_id')->toArray();

        // if ((in_array(user()->id, $this->leadAgentArray))) {
        //     $this->myAgentId = $this->leadAgents->filter(function ($value, $key) {
        //         return $value->user_id == user()->id;
        //     })->first()->id;
        // }

        // $leadContact = new Lead();

        // if ($leadContact->getCustomFieldGroupsWithFields()) {
        //     $this->fields = $leadContact->getCustomFieldGroupsWithFields()->fields;
        // }

        // $this->products = Product::all();
        // $this->sources = LeadSource::all();
        // $this->status = LeadStatus::all();
        // $this->categories = LeadCategory::all();
        // $this->countries = countries();
        // $this->salutations = Salutation::cases();
        
         $this->view = 'lead-contact.ajax.createvendor';

        if (request()->ajax()) {
            return $this->returnAjax($this->view);
       
        }

        return view('lead-contact.create', $this->data);
    }
    public function store(StoreVendorRequest $request)
    {
        $email = $request->input('email');
        // $leadContact = new Vendor();
        // $leadContact->vendor_name = $request->vendor_name;
        // $leadContact->vendor_email = $request->vendor_email;
        // $leadContact->vendor_number = $request->vendor_mobile;
        // $leadContact->save();
        Notification::route('mail', $email)->notify(new NewContract($contract));

    }
}
