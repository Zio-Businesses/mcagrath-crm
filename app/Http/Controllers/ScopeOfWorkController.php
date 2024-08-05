<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Reply;
use App\Models\Project;
use App\Models\ProjectSubCategory;
use App\Models\ProjectCategory;
use App\Models\VendorContract;
use App\Models\ScopeOfWork;
use Illuminate\Support\Facades\Log;

class ScopeOfWorkController extends AccountBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'app.menu.projects';
        $this->subcategories=ProjectSubCategory::all();
        $this->categories = ProjectCategory::all();
        $this->contracttype = VendorContract::getContractType();
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
        // $addProjectMilestonePermission = user()->permission('add_project_milestones');
        // $project = Project::findOrFail($id);
       

        // abort_403(!($addProjectMilestonePermission == 'all' || $project->project_admin == user()->id));

        return view('projects.sow.create', $this->data);
    }
    public function store(Request $request)
    {
        $sow = new ScopeOfWork();
        $sow->sow_title=$request->sow_title;
        $sow->project_id = $request->project_id;
        $sow->category = $request->category;
        $sow->sub_category = $request->sub_category;
        $sow->contractor_type = $request->contractor_type;
        $sow->description = $request->description;
        $sow->added_by = user()->id;
        $sow->save();

        $this->logProjectActivity($request->project_id, 'messages.newsowcreated');

        return Reply::success(__('Scope Of Work Saved Successfully'));
    }
    public function edit($id)
    {
        $this->sow = ScopeOfWork::findOrFail($id);

        return view('projects.sow.edit', $this->data);
    }

    public function show($id)
    {
        $this->sow = ScopeOfWork::findOrFail($id);
        return view('projects.sow.show', $this->data);
    }

    /**
     * @param StoreMilestone $request
     * @param int $id
     * @return array
     * @throws \Froiden\RestAPI\Exceptions\RelatedResourceNotFoundException
     */
    public function update(Request $request, $id)
    {
        $sow = ScopeOfWork::findOrFail($id);
        $sow->sow_title=$request->sow_title;
        $sow->project_id = $request->project_id;
        $sow->category = $request->category;
        $sow->sub_category = $request->sub_category;
        $sow->contractor_type = $request->contractor_type;
        $sow->description = $request->description;
        $sow->save();

        $this->logProjectActivity($sow->project_id, 'messages.sowupdated');

        return Reply::success(__('Scope Of Work Saved Successfully'));
    }
    public function destroy($id)
    {
        $sow = ScopeOfWork::findOrFail($id);

        ScopeOfWork::destroy($id);
        $this->logProjectActivity($sow->project_id, 'messages.sowdeleted');

        return Reply::success(__('messages.deleteSuccess'));
    }
}
