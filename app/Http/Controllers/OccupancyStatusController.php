<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Reply;
use App\Models\OccupancyStatus;
use App\Http\Requests\Project\StoreOccupancyStatus;

class OccupancyStatusController extends AccountBaseController
{
    public function edit($id)
    {
        $this->occupancyStatus = OccupancyStatus::findOrfail($id);

        return view('project-settings.edit-occupancystatus', $this->data);
    }

    public function update(StoreOccupancyStatus $request, $id)
    {
       
        $os = OccupancyStatus::findOrFail($id);
        $os->occupancy_status = strip_tags($request->occupancy_status);
        $os->save();
        return Reply::success(__('messages.updateSuccess'));
    }
    
    public function destroy($id)
    {
        OccupancyStatus::destroy($id);
        return Reply::success(__('messages.deleteSuccess'));
    }
}
