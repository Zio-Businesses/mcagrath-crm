<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Reply;
use App\Models\Project;
use App\Models\VendorContract;
use App\Models\ScopeOfWork;
use App\Models\ProjectType;
use App\Models\ContractTemplate;
use App\Models\ProjectVendor;
use Illuminate\Support\Facades\Log;

class ProjectVendorController extends AccountBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'app.menu.projects';
        $this->middleware(function ($request, $next) {
            abort_403(!in_array('projects', $this->user->modules));

            return $next($request);
        });
    }

    /**
     * XXXXXXXXXXX
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = request('id');

        $this->project = Project::findOrFail($id);
        $this->vendor=VendorContract::all();
        $this->sow=ScopeOfWork::all();
        $this->projecttype=ProjectType::all();
        $this->contract=ContractTemplate::all();
        // $addProjectMilestonePermission = user()->permission('add_project_milestones');
        $project = Project::findOrFail($id);
       // abort_403(!($addProjectMilestonePermission == 'all' || $project->project_admin == user()->id));
        return view('projects.vendors.create', $this->data);
    }
    
    public function store(Request $request)
    {
        $vendor = VendorContract::findOrFail($request->vendor_id);
        $vpro= new ProjectVendor();
        $vpro->project_id = $request->project_id;
        $vpro->vendor_name=$vendor->vendor_name;
        $vpro->vendor_phone=$vendor->cell;
        $vpro->vendor_email_address=$vendor->vendor_email;
        $vpro->sow_id=$request->sow_id;
        $vpro->vendor_id=$request->vendor_id;
        $vpro->link_sent_by=user()->id;
        $vpro->project_amount=$request->project_amount;
        $vpro->add_notes=$request->add_notes;
        $vpro->project_type=$request->project_type;
        $vpro->link_status='Sent';
        $vpro->save();
        $this->logProjectActivity($request->project_id, 'messages.vendorcreated');

        return Reply::success(__('New Vendor Added Successfully'));
        
    }
    public function destroy($id)
    {
        $vpro = ProjectVendor::findOrFail($id);

        ProjectVendor::destroy($id);
        $this->logProjectActivity($vpro->project_id, 'messages.vprodeleted');

        return Reply::success(__('messages.deleteSuccess'));
    }
}
