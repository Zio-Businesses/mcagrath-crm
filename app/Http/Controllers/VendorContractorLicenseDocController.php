<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorContractorLicenseDoc;
use App\Helper\Files;
use App\Helper\Reply;

class VendorContractorLicenseDocController extends AccountBaseController
{
    public function store(Request $request)
    {
        
        if ($request->hasFile('contractor_license_file')) {
           
        $file = new VendorContractorLicenseDoc();
        $fileData = $request->contractor_license_file;
        $file->vendor_id = $request->vendor_id_cont;
        $file->added_by = user()->id;
        $filename = Files::uploadLocalOrS3($fileData, VendorContractorLicenseDoc::FILE_PATH);
        $file->filename = $fileData->getClientOriginalName();
        $file->hashname = $filename;
        $file->size = $fileData->getSize();
        $file->save();
        return Reply::success(__('Uploaded Successfully'));
        }
    }

    public function download($id)
    {
        $file = VendorContractorLicenseDoc::whereRaw('md5(id) = ?', $id)->firstOrFail();

        return download_local_s3($file, 'vendor-contractor-license/' . $file->hashname);
    }
    public function destroy($id)
    {
        
        $file = VendorContractorLicenseDoc::findOrFail($id);

        // Files::deleteFile($file->hashname, 'vendor-contractor-license/' . $file->vendor_id);

        Files::deleteFile($file->hashname, VendorContractorLicenseDoc::FILE_PATH . '/');

        VendorContractorLicenseDoc::destroy($id);

        return Reply::success(__('messages.deleteSuccess'));
    }
    public function edit($id)
    {
        $this->expiry_date = VendorContractorLicenseDoc::findOrFail($id);
        return view('vendors.contractor-license.edit', $this->data);
    }
    public function update(Request $request, $id)
    {
        $expiry_date = VendorContractorLicenseDoc::findOrFail($id);
        $expiry_date->expiry_date = $request->expiry_date == null ? null : companyToYmd($request->expiry_date);
        $expiry_date->save();

        return Reply::success(__('Updated Successfully'));
    }
}
