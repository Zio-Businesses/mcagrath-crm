<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\VendorProjectDataTable;
use App\Models\User;
use App\Models\VendorContract;
use App\Models\ProjectStatusSetting;
class VendorProjectController extends AccountBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Projects - Vendors';
    
    }

    public function index(VendorProjectDataTable $dataTable)
    {
        if (!request()->ajax()) {
            $this->clients = User::allClients();
            $this->allEmployees = User::allEmployees(null, true, 'all');
            $this->vendor =  VendorContract::all();
            $this->projectStatus = ProjectStatusSetting::where('status', 'active')->get();
        }
        $this->view = 'vendors-projects.index';
        return $dataTable->render('vendors-projects.create', $this->data);
    }
}
