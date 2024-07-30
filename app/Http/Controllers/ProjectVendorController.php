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
use App\Models\Company;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewVendorWorkOrder;
use App\Http\Requests\Project\StoreProjectVendor;
use Illuminate\Support\Facades\App;

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
        $this->sow=$this->project->sow;
        $this->projecttype=ProjectType::all();
        $this->contract=ContractTemplate::all();
        // $addProjectMilestonePermission = user()->permission('add_project_milestones');
        $project = Project::findOrFail($id);
       // abort_403(!($addProjectMilestonePermission == 'all' || $project->project_admin == user()->id));
        return view('projects.vendors.create', $this->data);
    }
    
    public function store(StoreProjectVendor $request)
    {
        $vendor = VendorContract::findOrFail($request->vendor_id);
        $vpro= new ProjectVendor();
        $vpro->project_id = $request->project_id;
        $vpro->vendor_name=$vendor->vendor_name;
        $vpro->vendor_phone=$vendor->cell;
        $vpro->due_date=companyToYmd($request->due_date);
        $vpro->vendor_email_address=$vendor->vendor_email;
        $vpro->sow_id=$request->sow_id;
        $vpro->vendor_id=$request->vendor_id;
        $vpro->link_sent_by=user()->id;
        $vpro->project_amount=$request->project_amount;
        $vpro->add_notes=$request->add_notes;
        $vpro->project_type=$request->project_type;
        $vpro->contract_id=$request->contract_id;
        $vpro->link_status='Sent';
        $vpro->save();
        $this->logProjectActivity($request->project_id, 'messages.vendorcreated');
        Notification::route('mail', $vendor->vendor_email)->notify(new NewVendorWorkOrder($vpro->id,$request->project_id,$request->contract_id,$request->vendor_id));
        return Reply::success(__('New Vendor Added Successfully'));
        
    }
    public function update(Request $request, $id)
    {
        $vpro = ProjectVendor::findOrFail($id);
        $vpro->project_id = $request->project_id;
        $vpro->wo_status = $request->wo_status;
        $vpro->inspection_date = $request->inspection_date == null ? null : companyToYmd($request->inspection_date);
        $vpro->inspection_time = $request->inspection_time == null ? null : Carbon::createFromFormat($this->company->time_format, $request->inspection_time)->format('H:i:s');
        $vpro->re_inspection_date = $request->re_inspection_date == null ? null : companyToYmd($request->re_inspection_date);
        $vpro->re_inspection_time = $request->re_inspection_time == null ? null : Carbon::createFromFormat($this->company->time_format, $request->re_inspection_time)->format('H:i:s');
        $vpro->bid_ecd = $request->bid_ecd == null ? null : companyToYmd($request->bid_ecd);
        $vpro->bid_submitted_date = $request->bid_submitted_date == null ? null : companyToYmd($request->bid_submitted_date);
        $vpro->bid_amount = $request->bid_amount;
        $vpro->bid_rejected_date = $request->bid_rejected_date == null ? null : companyToYmd($request->bid_rejected_date);
        $vpro->bid_approval_date = $request->bid_approval_date == null ? null : companyToYmd($request->bid_approval_date);
        $vpro->work_schedule_date = $request->work_schedule_date == null ? null : companyToYmd($request->work_schedule_date);
        $vpro->work_schedule_time = $request->work_schedule_time == null ? null : Carbon::createFromFormat($this->company->time_format, $request->work_schedule_time)->format('H:i:s');
        $vpro->work_schedule_re_date = $request->work_schedule_re_date == null ? null : companyToYmd($request->work_schedule_re_date);
        $vpro->work_schedule_re_time = $request->work_schedule_re_time == null ? null : Carbon::createFromFormat($this->company->time_format, $request->work_schedule_re_time)->format('H:i:s');
        $vpro->work_completion_date = $request->work_completion_date == null ? null : companyToYmd($request->work_completion_date);
        $vpro->work_ecd = $request->work_ecd == null ? null : companyToYmd($request->work_ecd);
        $vpro->bid_approved_amount = $request->bid_approved_amount;
        $vpro->save();
        $this->logProjectActivity($request->project_id, 'messages.vendorupdated');

        return Reply::success(__('Vendor Updated'));
    }
    public function destroy($id)
    {
        $vpro = ProjectVendor::findOrFail($id);

        ProjectVendor::destroy($id);
        $this->logProjectActivity($vpro->project_id, 'messages.vprodeleted');

        return Reply::success(__('messages.deleteSuccess'));
    }
    public function download($id)
    {
        $this->pageTitle = 'app.menu.contracts';
        $this->pageIcon = 'fa fa-file';
        $this->company = Company::find(1);
        $this->projectvendor = ProjectVendor::findOrFail($id);
        $this->projectid = Project::findOrFail($this->projectvendor->project_id);
        $this->contractid = ContractTemplate::findOrFail($this->projectvendor->contract_id);
        $this->vendorid = VendorContract::findOrFail($this->projectvendor->vendor_id);
        $pdf = app('dompdf.wrapper');

        $pdf->setOption('enable_php', true);
        $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

        App::setLocale('en');
        Carbon::setLocale('en');
        $pdf->loadView('projects.vendors.contract-pdf', $this->data);

        $filename = 'contract-' . $this->projectvendor->id;

        return $pdf->download($filename . '.pdf');
    }
}
