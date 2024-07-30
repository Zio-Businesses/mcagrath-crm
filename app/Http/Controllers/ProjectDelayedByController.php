<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Project\StoreDelayedBy;
use App\Models\DelayedBy;
use App\Helper\Reply;

class ProjectDelayedByController extends AccountBaseController
{
    public function edit($id)
    {
        $this->delayedBy = DelayedBy::findOrfail($id);

        return view('project-settings.edit-delayedby', $this->data);
    }

    public function update(StoreDelayedBy $request, $id)
    {
       
        $delayedBy = DelayedBy::findOrFail($id);
        $delayedBy->delayed_by = $request->delayed_by;
        $delayedBy->save();
        return Reply::success(__('messages.updateSuccess'));
    }
    
    public function destroy($id)
    {
        DelayedBy::destroy($id);
        return Reply::success(__('messages.deleteSuccess'));
    }
}
