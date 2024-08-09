<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContractTemplate;
use Illuminate\Support\Facades\Log;
use App\Models\VendorWaiverFormTemplate;
use App\Helper\Reply;

class VendorSettingsController extends AccountBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Vendor Settings';
        $this->activeSettingMenu = 'vendor_settings';
        $this->middleware(function ($request, $next) {
            abort_403(user()->permission('manage_company_setting') !== 'all');

            return $next($request);
        });
    }
    public function index()
    {
        $this->contract=ContractTemplate::all();
        $this->wform=VendorWaiverFormTemplate::first();
        Log::info($this->wform);
        return view('vendor-settings.index', $this->data);
    }
    public function store(Request $request)
    {
        
        if (VendorWaiverFormTemplate::exists()) {
            if($request->value){
            $contract=ContractTemplate::findOrFail($request->value);
            $wform = VendorWaiverFormTemplate::first();
            $wform->waiver_template = $contract->contract_detail;
            $wform->save();
            return Reply::success(__('Updated'));
            }
        }
         else {
            if($request->value){
            $contract=ContractTemplate::findOrFail($request->value);
            $wform = new VendorWaiverFormTemplate();
            $wform->waiver_template = $contract->contract_detail;
            $wform->save();
            return Reply::success(__('Updated'));
            }
        }
    }
}
