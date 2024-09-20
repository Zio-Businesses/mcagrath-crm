<?php

namespace App\Observers;

use App\Models\ClientEstimatesFiles;
use App\Helper\Files;

use Carbon\Carbon;

class ClientEstimatesFilesObserver
{
    public function saving(ClientEstimatesFiles $Files)
    {
        

        if (!isRunningInConsoleOrSeeding()) {
            $Files->last_updated_by = user()->id;
        }
    }

    public function creating(ClientEstimatesFiles $Files)
    {

        if (!isRunningInConsoleOrSeeding()) {
            $Files->added_by = user()->id;
            $Files->created_at = now()->format('Y-m-d H:i:s');
        }
    }

    /**
     * Handle the ClientEstimatesFiles "deleted" event.
     */
    public function deleting(ClientEstimatesFiles $Files)
    {
        $Files->load('estimate');

        if (!isRunningInConsoleOrSeeding()) {
            if (isset($Files->estimate) && $Files->estimate->default_image == $Files->hashname) {
                $Files->estimate->default_image = null;
                $Files->estimate->save();
            }
        }

        Files::deleteFile($Files->hashname, ClientEstimatesFiles::FILE_PATH);
    }

}
