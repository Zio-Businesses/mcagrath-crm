<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Project\StoreContractorType;
use App\Models\ContractorType;
use App\Helper\Reply;

class ContractorTypeController extends AccountBaseController
{
    public function edit($id)
    {
        $this->contractortype = ContractorType::findOrfail($id);

        return view('project-settings.edit-contractor-type', $this->data);
    }

    public function update(StoreContractorType $request, $id)
    {
       
        $ct = ContractorType::findOrFail($id);
        $ct->contractor_type = $request->contractor_type;
        $ct->save();
        return Reply::success(__('messages.updateSuccess'));
    }
    
    public function destroy($id)
    {
        ContractorType::destroy($id);
        return Reply::success(__('messages.deleteSuccess'));
    }
}
