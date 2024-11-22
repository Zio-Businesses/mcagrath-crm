<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Files;
use App\Helper\Reply;
use App\Traits\IconTrait;
use App\Models\VendorDocs;

class VendorDocController extends AccountBaseController
{
    use IconTrait;

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {

            // $defaultImage = null;

            foreach ($request->file as $fileData) {
                $file = new VendorDocs();
                $file->vendor_id = $request->vendor_id;
                $filename = Files::uploadLocalOrS3($fileData, VendorDocs::FILE_PATH);
                $file->filename = $fileData->getClientOriginalName();
                $file->hashname = $filename;
                $file->size = $fileData->getSize();
                $file->save();
            }

        }

        return Reply::success(__('messages.fileUploaded'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $file = VendorDocs::findOrFail($id);
        $this->deletePermission = user()->permission('delete_invoices');
        abort_403(!($this->deletePermission == 'all' || ($this->deletePermission == 'added' && $file->added_by == user()->id)));

        Files::deleteFile($file->hashname, 'vendor-docs/' . $file->vendor_id);

        VendorDocs::destroy($id);

        $this->files = VendorDocs::where('vendor_id', $file->vendor_id)->orderByDesc('id')->get();
        // $view = view('estimates.ajax.show', $this->data)->render();

        return Reply::success(__('messages.deleteSuccess'));
    }

    public function download($id)
    {
        $file = VendorDocs::whereRaw('md5(id) = ?', $id)->firstOrFail();

        $this->viewPermission = user()->permission('view_invoices');
        abort_403(!($this->viewPermission == 'all' || ($this->viewPermission == 'added' && $file->added_by == user()->id)));

        return download_local_s3($file, 'vendor-docs/' . $file->hashname);
    }
}
