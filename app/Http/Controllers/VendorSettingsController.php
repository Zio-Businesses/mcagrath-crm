<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContractTemplate;

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
        return view('vendor-settings.index', $this->data);
    }
}
