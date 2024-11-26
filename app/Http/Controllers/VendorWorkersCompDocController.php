<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorWorkersCompDoc;
use App\Helper\Files;
use App\Helper\Reply;

class VendorWorkersCompDocController extends AccountBaseController
{
    public function store(Request $request)
    {
        if ($request->hasFile('wcomp')) {
           
        $file = new VendorWorkersCompDoc();
        $fileData = $request->wcomp;
        $file->vendor_id = $request->vendor_id_wc;
        $file->added_by = user()->id;
        $filename = Files::uploadLocalOrS3($fileData, VendorWorkersCompDoc::FILE_PATH);
        $file->filename = $fileData->getClientOriginalName();
        $file->hashname = $filename;
        $file->size = $fileData->getSize();
        $file->save();
        return Reply::success(__('Uploaded Successfully'));
        }
    }

    public function download($id)
    {
        $file = VendorWorkersCompDoc::whereRaw('md5(id) = ?', $id)->firstOrFail();

        return download_local_s3($file, 'vendor-workers-comp/' . $file->hashname);
    }
    public function destroy($id)
    {
        
        $file = VendorWorkersCompDoc::findOrFail($id);

        Files::deleteFile($file->hashname, 'vendor-workers-comp/');

        VendorWorkersCompDoc::destroy($id);

        return Reply::success(__('messages.deleteSuccess'));
    }
    public function edit($id)
    {
        $this->expiry_date = VendorWorkersCompDoc::findOrFail($id);
        return view('vendors.workers-comp.edit', $this->data);
    }
    public function update(Request $request, $id)
    {
        $expiry_date = VendorWorkersCompDoc::findOrFail($id);
        $expiry_date->expiry_date = $request->expiry_date == null ? null : companyToYmd($request->expiry_date);
        $expiry_date->save();

        return Reply::success(__('Updated Successfully'));
    }
}
