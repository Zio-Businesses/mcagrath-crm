<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Reply;
use App\Models\ProjectPriority;
use App\Http\Requests\Project\StoreProjectPriority;

class ProjectPriorityController extends AccountBaseController
{
    public function edit($id)
    {
        $this->projectPriority = ProjectPriority::findOrfail($id);

        return view('project-settings.edit-priority', $this->data);
    }

    public function update(StoreProjectPriority $request, $id)
    {
       
        $priority = ProjectPriority::findOrFail($id);
        $priority->priority = strip_tags($request->priority);
        $priority->save();
        return Reply::success(__('messages.updateSuccess'));
    }
    
    public function destroy($id)
    {
        ProjectPriority::destroy($id);
        return Reply::success(__('messages.deleteSuccess'));
    }
}
