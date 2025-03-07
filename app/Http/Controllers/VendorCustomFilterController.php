<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorCustomFilter;
use App\Helper\Reply;
use App\Models\ContractorType;
use App\Models\Locations;
use App\Models\User;

class VendorCustomFilterController extends AccountBaseController
{
    public function store(Request $request)
    { 
        $request->validate([
            'filter_name' => 'required',
        ]);
        $vcf = new VendorCustomFilter();
        $vcf->user_id = $request->user_id;
        $vcf->start_date = $request->startDate;
        $vcf->end_date = $request->endDate;
        $vcf->state = $request->filter_state;
        $vcf->county = $request->filter_county;
        $vcf->city = $request->filter_city;
        $vcf->contractor_type = $request->filter_contractor_type;
        $vcf->vendor_status = $request->filter_status;
        $vcf->created_by = $request->filter_members;
        $vcf->name=$request->filter_name;
        $vcf->save();

        return Reply::success(__('Filter Saved'));
    }

    public function edit($id)
    {
        $this->contracttype = ContractorType::all();
        $this->state=Locations::select('state')->distinct()->get();
        $this->county=Locations::select('county')->distinct()->get();
        $this->city=Locations::select('city')->distinct()->get();
        $this->allEmployees = User::allEmployees(null, true, 'all');
        $this->filter = VendorCustomFilter::findOrFail($id);
        return view('vendors.edit-filter', $this->data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'filter_name' => 'required',
        ]);
        $vcf = VendorCustomFilter::findOrFail($id);
        $vcf->start_date = $request->filterstartDate;
        $vcf->end_date = $request->filterendDate;
        $vcf->state = $request->filter_state;
        $vcf->county = $request->filter_county;
        $vcf->city = $request->filter_city;
        $vcf->contractor_type = $request->filter_contractor_type;
        $vcf->vendor_status = $request->filter_status;
        $vcf->created_by = $request->filter_members;
        $vcf->name=$request->filter_name;
        $vcf->save();
        return Reply::success(__('Filter Updated'));
    }
    public function destroy($id)
    {
        VendorCustomFilter::destroy($id);
        return Reply::success(__('Deleted Successfully'));
    }

    public function changestatus($id){
        $projectFilter = VendorCustomFilter::where('user_id', user()->id)->get();
        foreach ($projectFilter as $filter)
        {
            $filter->status='inactive';
            $filter->save();
        }
        $filter = VendorCustomFilter::findOrFail($id);
        $filter->status = 'active';
        $filter->save();
        return Reply::success(__('Filter Applied'));
    }

    public function clear($id){

        $filter = VendorCustomFilter::findOrFail($id);
        $filter->status = 'inactive';
        $filter->save();
        return Reply::success(__('Filter Removed'));
    }
}
