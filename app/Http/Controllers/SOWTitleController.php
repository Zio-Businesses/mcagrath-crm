<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SOWTitle;
use App\Helper\Reply;

class SOWTitleController extends AccountBaseController
{
    public function edit($id)
    {
        $this->sow_title = SOWTitle::findOrfail($id);

        return view('vendor-settings.edit-sowtitle', $this->data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sow_title' => 'required',
        ]);
        $sow = SOWTitle::findOrFail($id);
        $sow->sow_title = $request->sow_title;
        $sow->save();
        return Reply::success(__('messages.updateSuccess'));
    }
    
    public function destroy($id)
    {
        SOWTitle::destroy($id);
        return Reply::success(__('messages.deleteSuccess'));
    }
}
