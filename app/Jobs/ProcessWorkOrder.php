<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\WorkOrderAcceptNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\App;
use App\Models\ProjectVendor;
use App\Models\Project;
use App\Models\ContractTemplate;
use App\Models\VendorContract;
use App\Models\Company;
use App\Models\ProjectFile;
use App\Helper\Files;
use Illuminate\Http\UploadedFile;

class ProcessWorkOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $projectVendorId;
    /**
     * Create a new job instance.
     */
    public function __construct($projectVendorId)
    {
        $this->projectVendorId = $projectVendorId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // \Log::info('Processing job for ProjectVendor ID: ' . $this->projectVendorId);
        $this->pdfGeneration($this->projectVendorId);
        // $vendorid = ProjectVendor::findOrFail($this->projectVendorId);
        // if($pdfGenerated){
        // Notification::route('mail', $vendorid->vendor_email_address)->notify(new WorkOrderAcceptNotification($vendorid->id, $pdfGenerated));
        // }
    }

    public function pdfGeneration($projectvendorid)
    {
        $this->pageTitle = 'app.menu.contracts';
        $this->pageIcon = 'fa fa-file';
        $this->company = Company::find(1);
        $this->projectvendor = ProjectVendor::findOrFail($projectvendorid);
        $this->projectid = Project::findOrFail($this->projectvendor->project_id);
        $this->contractid = ContractTemplate::findOrFail($this->projectvendor->contract_id);
        $this->vendorid = VendorContract::findOrFail($this->projectvendor->vendor_id);

        $svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" fill="red"/></svg>';
        $base64Svg = base64_encode($svg);
        $this->base64StringTimes = "data:image/svg+xml;base64," . $base64Svg;

        $svgCheck = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" fill="green"/></svg>';
        $base64SvgCheck = base64_encode($svgCheck);
        $this->base64StringCheck = "data:image/svg+xml;base64," . $base64SvgCheck;

        $pdf = app('dompdf.wrapper');
        $pdf->setOption('enable_php', true);
        $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

        App::setLocale('en');
        Carbon::setLocale('en');

        $data = [
            'pageTitle' => $this->pageTitle,
            'pageIcon' => $this->pageIcon,
            'company' => $this->company,
            'projectvendor' => $this->projectvendor,
            'projectid' => $this->projectid,
            'contractid' => $this->contractid,
            'vendorid' => $this->vendorid,
            'base64StringTimes' => $this->base64StringTimes,
            'base64StringCheck' => $this->base64StringCheck,
        ];

        $pdf->loadView('projects.vendors.contract-pdf', $data);
        
        $pdfContent = $pdf->download()->getOriginalContent();
        $filePath = "app/pdf/{$projectvendorid}/workorder-{$this->projectvendor->vendor_name}.pdf";

        \Storage::disk('localBackup')->put($filePath, $pdfContent);

        $projectfile = ProjectFile::where('project_vendor_id', $projectvendorid)->first();

        if($projectfile)
        {
            Files::deleteFile($projectfile->hashname, ProjectFile::FILE_PATH . '/' . $this->projectid->id);

            ProjectFile::where('project_vendor_id', $projectvendorid)->delete();

            $filePathOnDisk = \Storage::disk('localBackup')->path($filePath);

            $uploadedFile = new UploadedFile(
                $filePathOnDisk,         // Full file path to the file
                basename($filePath),     // Original file name (without path)
                mime_content_type($filePathOnDisk),  // Mime type (you can use mime_content_type() or leave it as null)
                null,                    // Error flag (optional)
                true                     // Ensure it is marked as valid
            );

            $pf = new ProjectFile();
            $pf->project_id = $this->projectid->id;

            $filename = Files::uploadLocalOrS3($uploadedFile, ProjectFile::FILE_PATH . '/' . $this->projectid->id);

            $pf->user_id = 1;
            $pf->project_vendor_id = $projectvendorid;
            $pf->filename = $uploadedFile->getClientOriginalName();
            $pf->hashname = $filename;
            $pf->size = $uploadedFile->getSize();
            $pf->save();
            
        }
        else{
            
            $filePathOnDisk = \Storage::disk('localBackup')->path($filePath);
            $uploadedFile = new UploadedFile(
                $filePathOnDisk,         // Full file path to the file
                basename($filePath),     // Original file name (without path)
                mime_content_type($filePathOnDisk),  // Mime type (you can use mime_content_type() or leave it as null)
                null,                    // Error flag (optional)
                true                     // Ensure it is marked as valid
            );

            $pf = new ProjectFile();
            $pf->project_id = $this->projectid->id;

            $filename = Files::uploadLocalOrS3($uploadedFile, ProjectFile::FILE_PATH . '/' . $this->projectid->id);

            $pf->user_id = 1;
            $pf->project_vendor_id = $projectvendorid;
            $pf->filename = $uploadedFile->getClientOriginalName();
            $pf->hashname = $filename;
            $pf->size = $uploadedFile->getSize();
            $pf->save();
        }
        
    

        
    }
}
