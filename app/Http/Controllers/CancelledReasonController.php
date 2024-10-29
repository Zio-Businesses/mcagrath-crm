<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Project\StoreCancelledReason;
use App\Models\CancelledReason;
use App\Helper\Reply;

class CancelledReasonController extends AccountBaseController
{
    public function edit($id)
    {
        $this->cancelledreason = CancelledReason::findOrfail($id);

        return view('project-settings.edit-cancelled-reason', $this->data);
    }

    public function update(StoreCancelledReason $request, $id)
    {
       
        $ct = CancelledReason::findOrFail($id);
        $ct->cancelled_reason = $request->cancelled_reason;
        $ct->save();
        return Reply::success(__('messages.updateSuccess'));
    }
    
    public function destroy($id)
    {
        CancelledReason::destroy($id);
        return Reply::success(__('messages.deleteSuccess'));
    }
}
