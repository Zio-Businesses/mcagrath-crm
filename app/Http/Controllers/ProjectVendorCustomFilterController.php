<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectVendorCustomFilter;
use Exception;
use App\Helper\Reply;

class ProjectVendorCustomFilterController extends AccountBaseController
{
    public function store(Request $request)
    {
        
        $request->validate([
            'filter_name' => 'required',
        ]);
        $pcvf = new ProjectVendorCustomFilter();
        $pcvf->user_id = $request->user_id;
        $pcvf->start_date = $request->startDate;
        $pcvf->end_date = $request->endDate;
        $pcvf->project_category = $request->filter_category_id;
        $pcvf->vendor_id = $request->filter_vendor;
        $pcvf->link_status = $request->filter_link_status;
        $pcvf->work_order_status = $request->filter_wo_status;
        $pcvf->project_status = $request->filter_project_status;
        $pcvf->client_id = $request->filter_client;
        $pcvf->project_members = $request->filter_members;
        $pcvf->name=$request->filter_name;
        $pcvf->save();

        return Reply::success(__('Filter Saved'));
    }
}
