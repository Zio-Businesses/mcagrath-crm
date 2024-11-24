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

            $this->storeFiles($request);

            $this->vendorDetail = VendorDocs::where('vendor_id', $request->vendor_id)->orderByDesc('id')->get();
            $view = view('vendors.docs.show', $this->data)->render();

            return Reply::dataOnly(['status' => 'success', 'view' => $view]);
        }
    }
    private function storeFiles($request)
    {
        if ($request->hasFile('file')) {
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
    }

    public function edit($id)
    {
        $this->name = VendorDocs::findOrFail($id);
        return view('vendors.docs.rename', $this->data);
    }
    public function update(Request $request, $id)
    {
        $rename = VendorDocs::findOrFail($id);
        $rename->filename = $request->filename;
        $rename->save();
        $this->vendorDetail = VendorDocs::where('vendor_id', $rename->vendor_id)->orderByDesc('id')->get();
        $view = view('vendors.docs.show', $this->data)->render();
        return Reply::successWithData(__('Updated Successfully'), ['view' => $view]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $file = VendorDocs::findOrFail($id);
        // $this->deletePermission = user()->permission('delete_invoices');
        // abort_403(!($this->deletePermission == 'all' || ($this->deletePermission == 'added' && $file->added_by == user()->id)));

        Files::deleteFile($file->hashname, 'vendor-docs/' . $file->vendor_id);

        VendorDocs::destroy($id);

        $this->vendorDetail = VendorDocs::where('vendor_id', $file->vendor_id)->orderByDesc('id')->get();
        // $view = view('estimates.ajax.show', $this->data)->render();

        $view = view('vendors.docs.show', $this->data)->render();

        return Reply::successWithData(__('messages.deleteSuccess'), ['view' => $view]);
    }

    public function download($id)
    {
        $file = VendorDocs::whereRaw('md5(id) = ?', $id)->firstOrFail();

        // $this->viewPermission = user()->permission('view_invoices');
        // abort_403(!($this->viewPermission == 'all' || ($this->viewPermission == 'added' && $file->added_by == user()->id)));

        return download_local_s3($file, 'vendor-docs/' . $file->hashname);
    }
}
