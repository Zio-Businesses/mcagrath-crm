<?php

namespace App\Observers;
use App\Models\VendorDocs;
use App\Helper\Files;

use Carbon\Carbon;

class VendorDocsObserver
{
    public function saving(VendorDocs $Files)
    {
        
        if (!isRunningInConsoleOrSeeding()) {
            $Files->last_updated_by = user()->id;
        }
    }

    public function creating(VendorDocs $Files)
    {

        if (!isRunningInConsoleOrSeeding()) {
            $Files->added_by = user()->id;
            $Files->created_at = now()->format('Y-m-d H:i:s');
        }
    }

    /**
     * Handle the VendorDocs "deleted" event.
     */
    public function deleting(VendorDocs $Files)
    {
        Files::deleteFile($Files->hashname, VendorDocs::FILE_PATH);
    }
}
