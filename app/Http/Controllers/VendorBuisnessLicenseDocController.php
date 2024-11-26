<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorBuisnessLicenseDoc;
use App\Helper\Files;
use App\Helper\Reply;

class VendorBuisnessLicenseDocController extends AccountBaseController
{
    public function store(Request $request)
    {
        if ($request->hasFile('buisness_license')) {
           
        $file = new VendorBuisnessLicenseDoc();
        $fileData = $request->buisness_license;
        $file->vendor_id = $request->vendor_id_buisness;
        $file->added_by = user()->id;
        $filename = Files::uploadLocalOrS3($fileData, VendorBuisnessLicenseDoc::FILE_PATH);
        $file->filename = $fileData->getClientOriginalName();
        $file->hashname = $filename;
        $file->size = $fileData->getSize();
        $file->save();
        return Reply::success(__('Uploaded Successfully'));
        }
    }

    public function download($id)
    {
        $file = VendorBuisnessLicenseDoc::whereRaw('md5(id) = ?', $id)->firstOrFail();

        return download_local_s3($file, 'vendor-buisness-license/' . $file->hashname);
    }
    public function destroy($id)
    {
        
        $file = VendorBuisnessLicenseDoc::findOrFail($id);

        Files::deleteFile($file->hashname, 'vendor-buisness-license/');

        VendorBuisnessLicenseDoc::destroy($id);

        return Reply::success(__('messages.deleteSuccess'));
    }
    public function edit($id)
    {
        $this->expiry_date = VendorBuisnessLicenseDoc::findOrFail($id);
        return view('vendors.buisness-license.edit', $this->data);
    }
    public function update(Request $request, $id)
    {
        $expiry_date = VendorBuisnessLicenseDoc::findOrFail($id);
        $expiry_date->expiry_date = $request->expiry_date == null ? null : companyToYmd($request->expiry_date);
        $expiry_date->save();

        return Reply::success(__('Updated Successfully'));
    }
}
