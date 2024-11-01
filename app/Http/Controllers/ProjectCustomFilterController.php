<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectCustomFilter;
use Exception;
use App\Helper\Reply;

class ProjectCustomFilterController extends AccountBaseController
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'filter_name' => 'required',
            ]);
            $pcf = new ProjectCustomFilter();
            $pcf->user_id = $request->user_id;
            $pcf->filter_on = $request->custom_date_filter_on;
            $pcf->start_date = $request->startDate;
            $pcf->end_date = $request->endDate;
            $pcf->project_category = $request->filter_category_id;
            $pcf->project_sub_category = $request->filter_sub_category;
            $pcf->project_type = $request->filter_type;
            $pcf->project_priority = $request->filter_priority;
            $pcf->project_status = $request->filter_status;
            $pcf->delayed_by = $request->filter_delayed;
            $pcf->client_id = $request->filter_client;
            $pcf->city = $request->filter_city;
            $pcf->county = $request->filter_county;
            $pcf->state = $request->filter_state;
            $pcf->project_members = $request->filter_members;
            $pcf->name=$request->filter_name;
            $pcf->save();
    
            return Reply::success(__('Filter Saved'));
            
        } catch (Exception $e) {
            return Reply::error(__('An error occurred while saving the filter.'));
        }
    }
    public function destroy($id)
    {
        try {
            
            $pcf = ProjectCustomFilter::where('user_id', $id)->first();

            if (!$pcf) {
                $pcf = new ProjectCustomFilter();
            }
            $pcf->filter_on = null;
            $pcf->start_date = null;
            $pcf->end_date = null;
            $pcf->project_category = null;
            $pcf->project_sub_category = null;
            $pcf->project_type = null;
            $pcf->project_priority = null;
            $pcf->project_status = null;
            $pcf->delayed_by = null;
            $pcf->client_id = null;
            $pcf->city = null;
            $pcf->county = null;
            $pcf->state = null;
            $pcf->project_members = null;
            $pcf->save();
    
            return Reply::success(__('Filter Reset'));
            
        } catch (Exception $e) {
            return Reply::error(__('An error occurred while resetting the filter.'));
        }
    }
    
}
