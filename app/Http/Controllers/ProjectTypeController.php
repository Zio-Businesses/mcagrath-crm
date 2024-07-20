<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Helper\Reply;
use App\Http\Controllers\Controller;
use App\Models\ProjectType;
use App\Http\Requests\Project\StoreProjectType;

class ProjectTypeController extends AccountBaseController
{
    public function edit($id)
    {
        $this->projectType = ProjectType::findOrfail($id);

        return view('project-settings.edit-type', $this->data);
    }

    public function update(StoreProjectType $request, $id)
    {
       
        $type = ProjectType::findOrFail($id);
        $type->type = strip_tags($request->type);
        $type->save();
        return Reply::success(__('messages.updateSuccess'));
    }
    
    public function destroy($id)
    {
        ProjectType::destroy($id);
        return Reply::success(__('messages.deleteSuccess'));
    }
}
