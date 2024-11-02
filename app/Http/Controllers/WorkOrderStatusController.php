<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkOrderStatus;
use App\Helper\Reply;

class WorkOrderStatusController extends AccountBaseController
{
    public function edit($id)
    {
        $this->wo_status = WorkOrderStatus::findOrfail($id);

        return view('vendor-settings.edit-workorder-status', $this->data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'wo_status' => 'required',
        ]);
        $ct = WorkOrderStatus::findOrFail($id);
        $ct->wo_status = $request->wo_status;
        $ct->save();
        return Reply::success(__('messages.updateSuccess'));
    }
    
    public function destroy($id)
    {
        WorkOrderStatus::destroy($id);
        return Reply::success(__('messages.deleteSuccess'));
    }
}
