<?php

namespace App\Http\Controllers;

use App\Helper\Reply;
use App\Http\Requests\ProjectMembers\SaveGroupMembers;
use App\Http\Requests\ProjectMembers\StoreProjectMembers;
use App\Models\EmployeeDetails;
use App\Models\Project;
use App\Models\ProjectMember;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectMemberController extends AccountBaseController
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

        $addProjectMemberPermission = user()->permission('add_project_members');
        $project = Project::findOrFail($id);

        abort_403(!($addProjectMemberPermission == 'all' || $addProjectMemberPermission == 'added' || $project->project_admin == user()->id));

        $this->employees = User::doesntHave('member', 'and', function ($query) use ($id) {
            $query->where('project_id', $id);
        })
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('users.id', 'users.name', 'users.email', 'users.created_at', 'users.image')
            ->where('roles.name', 'employee')
            ->groupBy('users.id')
            ->get();

        $this->groups = Team::all();
        $this->projectId = $id;
        return view('projects.project-member.create', $this->data);
    }

    /**
     * @param StoreProjectMembers $request
     * @return array
     * @throws \Froiden\RestAPI\Exceptions\RelatedResourceNotFoundException
     */
    public function store(StoreProjectMembers $request)
    {
        $project = Project::findOrFail($request->project_id);
        $project->projectMembers()->syncWithoutDetaching(request()->user_id);

        return Reply::success(__('messages.recordSaved'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $member = ProjectMember::findOrFail($id);
        $member->hourly_rate = $request->hourly_rate;
        $member->save();
        return Reply::success(__('messages.updateSuccess'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if($request->action=='coordinator'){
            $projectMember = ProjectMember::findOrFail($id);

            $project = Project::withTrashed()->findOrFail($projectMember->project_id);

            if ($project->project_admin == $projectMember->user_id) {
                $project->project_admin = null;
                $project->save();
            }

            $projectMember->delete();
        }
        if($request->action=='estimator')
        {
            $project = Project::findOrFail($request->project);
            $project->est_users()->detach($id);
        }
        if($request->action=='accounting')
        {
            $project = Project::findOrFail($request->project);
            $project->acct_users()->detach($id);
        }
        if($request->action=='emanager')
        {
            $project = Project::findOrFail($request->project);
            $project->emanager_users()->detach($id);
        }
        return Reply::success(__('messages.memberRemovedFromProject'));
    }

    public function storeGroup(SaveGroupMembers $request)
    {
        $groups = $request->group_id;
        $project = Project::findOrFail($request->project_id);

        foreach ($groups as $group) {

            $members = EmployeeDetails::join('users', 'users.id', '=', 'employee_details.user_id')
                ->where('employee_details.department_id', $group)
                ->where('users.status', 'active')
                ->select('employee_details.*')
                ->get();

            foreach ($members as $user) {
                $check = ProjectMember::where('user_id', $user->user_id)->where('project_id', $request->project_id)->first();

                if (is_null($check)) {
                    $member = new ProjectMember();
                    $member->user_id = $user->user_id;
                    $member->project_id = $request->project_id;
                    $member->save();
                }
            }
        }

        return Reply::success(__('messages.recordSaved'));
    }

    public function removeExt(Request $request,$id)
    {
        if($request->action=='coordinator')
        {
            $project = Project::findOrFail($id);
            $project->project_coordinator_id=null;
            $project->save();
        }
        if($request->action=='scheduler')
        {
            $project = Project::findOrFail($id);
            $project->project_scheduler_id= null;
            $project->save();
        }
        if($request->action=='recruiter')
        {
            $project = Project::findOrFail($id);
            $project->vendor_recruiter_id=null;
            $project->save();
        }
        return Reply::success(__('messages.memberRemovedFromProject'));

    }

}
