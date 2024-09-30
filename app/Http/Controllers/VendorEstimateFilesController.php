<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Files;
use App\Helper\Reply;
use App\Traits\IconTrait;
use App\Models\VendorEstimateFiles;

class VendorEstimateFilesController extends AccountBaseController
{
    use IconTrait;

    public function __construct()
    {
        parent::__construct();
        $this->pageIcon = 'icon-people';
        $this->pageTitle = 'app.menu.invoice';
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {

            $defaultImage = null;

            foreach ($request->file as $fileData) {
                $file = new VendorEstimateFiles();
                $file->vendor_estimates_id = $request->estimates_id;

                $filename = Files::uploadLocalOrS3($fileData, VendorEstimateFiles::FILE_PATH);

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
        
        $file = VendorEstimateFiles::findOrFail($id);
        $this->deletePermission = user()->permission('delete_invoices');
        abort_403(!($this->deletePermission == 'all' || ($this->deletePermission == 'added' && $file->added_by == user()->id)));

        Files::deleteFile($file->hashname, 'vendor-estimate-files/' . $file->vendor_estimates_id);

        VendorEstimateFiles::destroy($id);

        $this->files = VendorEstimateFiles::where('vendor_estimates_id', $file->vendor_estimates_id)->orderByDesc('id')->get();
        // $view = view('estimates.ajax.show', $this->data)->render();

        return Reply::success(__('messages.deleteSuccess'));
    }

    public function download($id)
    {
        $file = VendorEstimateFiles::whereRaw('md5(id) = ?', $id)->firstOrFail();

        $this->viewPermission = user()->permission('view_invoices');
        abort_403(!($this->viewPermission == 'all' || ($this->viewPermission == 'added' && $file->added_by == user()->id)));

        return download_local_s3($file, 'vendor-estimate-files/' . $file->hashname);
    }
}
