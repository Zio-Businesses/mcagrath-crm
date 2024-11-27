<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorWnineDoc;
use App\Helper\Files;
use App\Helper\Reply;

class VendorWnineDocController extends AccountBaseController
{
    public function store(Request $request)
    {
        if ($request->hasFile('wnine')) {
           
        $file = new VendorWnineDoc();
        $fileData = $request->wnine;
        $file->vendor_id = $request->vendor_id_wnine;
        $file->added_by = user()->id;
        $filename = Files::uploadLocalOrS3($fileData, VendorWnineDoc::FILE_PATH);
        $file->filename = $fileData->getClientOriginalName();
        $file->hashname = $filename;
        $file->size = $fileData->getSize();
        $file->save();
        return Reply::success(__('Uploaded Successfully'));
        }
    }

    public function download($id)
    {
        $file = VendorWnineDoc::whereRaw('md5(id) = ?', $id)->firstOrFail();

        return download_local_s3($file, 'vendors-w9/' . $file->hashname);
    }
    public function destroy($id)
    {
        
        $file = VendorWnineDoc::findOrFail($id);

        Files::deleteFile($file->hashname, 'vendors-w9/');

        VendorWnineDoc::destroy($id);

        return Reply::success(__('messages.deleteSuccess'));
    }
    public function edit($id)
    {
        $this->expiry_date = VendorWnineDoc::findOrFail($id);
        return view('vendors.wnine.edit', $this->data);
    }
    public function update(Request $request, $id)
    {
        $expiry_date = VendorWnineDoc::findOrFail($id);
        $expiry_date->expiry_date = $request->expiry_date == null ? null : companyToYmd($request->expiry_date);
        $expiry_date->save();

        return Reply::success(__('Updated Successfully'));
    }
}
