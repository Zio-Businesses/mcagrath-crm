<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorCoiDoc;
use App\Helper\Files;
use App\Helper\Reply;

class VendorCoiDocController extends AccountBaseController
{
    public function store(Request $request)
    {
        if ($request->hasFile('coi')) {
           
        $file = new VendorCoiDoc();
        $fileData = $request->coi;
        $file->vendor_id = $request->vendor_id_coi;
        $file->added_by = user()->id;
        $filename = Files::uploadLocalOrS3($fileData, VendorCoiDoc::FILE_PATH);
        $file->filename = $fileData->getClientOriginalName();
        $file->hashname = $filename;
        $file->size = $fileData->getSize();
        $file->save();
        return Reply::success(__('Uploaded Successfully'));
        }
    }

    public function download($id)
    {
        $file = VendorCoiDoc::whereRaw('md5(id) = ?', $id)->firstOrFail();

        return download_local_s3($file, 'vendor-coi/' . $file->hashname);
    }
    public function destroy($id)
    {
        
        $file = VendorCoiDoc::findOrFail($id);

        Files::deleteFile($file->hashname, 'vendor-coi/');

        VendorCoiDoc::destroy($id);

        return Reply::success(__('messages.deleteSuccess'));
    }
    public function edit($id)
    {
        $this->expiry_date = VendorCoiDoc::findOrFail($id);
        return view('vendors.coi.edit', $this->data);
    }
    public function update(Request $request, $id)
    {
        $expiry_date = VendorCoiDoc::findOrFail($id);
        $expiry_date->expiry_date = $request->expiry_date == null ? null : companyToYmd($request->expiry_date);
        $expiry_date->save();

        return Reply::success(__('Updated Successfully'));
    }
}
