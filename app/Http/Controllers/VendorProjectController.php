<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\VendorProjectDataTable;

class VendorProjectController extends AccountBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Projects - Vendors';
    
    }

    public function index(VendorProjectDataTable $dataTable)
    {
        // if (!request()->ajax()) {
        //     $this->clients = VendorContract::all();
        // }
        $this->view = 'vendors-projects.index';
        return $dataTable->render('vendors-projects.create', $this->data);
    }
}
