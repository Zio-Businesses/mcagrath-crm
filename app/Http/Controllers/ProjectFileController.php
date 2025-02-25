<?php

namespace App\Http\Controllers;

use App\Helper\Files;
use App\Helper\Reply;
use App\Models\ProjectFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\GlobalSetting;

class ProjectFileController extends AccountBaseController
{

    /**
     * @param Request $request
     * @return mixed|void
     * @throws \Froiden\RestAPI\Exceptions\RelatedResourceNotFoundException
     */
    public function store(Request $request)
    {

        if ($request->hasFile('file')) {

            $this->storeFiles($request);

            $this->files = ProjectFile::where('project_id', $request->project_id)->orderByDesc('id')->get();
            $view = view('projects.files.show', $this->data)->render();

            return Reply::dataOnly(['status' => 'success', 'view' => $view]);
        }
    }

    public function storeMultiple(Request $request)
    {
        if ($request->hasFile('file')) {
            $this->storeFiles($request);
        }
    }

    private function storeFiles($request)
    {
        foreach ($request->file as $fileData) {

            $file = new ProjectFile();
            $file->project_id = $request->project_id;

            $filename = Files::uploadLocalOrS3($fileData, ProjectFile::FILE_PATH . '/' . $request->project_id);

            $file->user_id = $this->user->id;
            $file->filename = $fileData->getClientOriginalName();
            $file->hashname = $filename;
            $file->size = $fileData->getSize();
            $file->save();
            $this->logProjectActivity($request->project_id, 'messages.newFileUploadedToTheProject');
        }
    }

    public function destroy(Request $request, $id)
    {
        $file = ProjectFile::findOrFail($id);
        $deleteDocumentPermission = user()->permission('delete_project_files');
        abort_403(!($deleteDocumentPermission == 'all' || ($deleteDocumentPermission == 'added' && $file->added_by == user()->id)));

        Files::deleteFile($file->hashname, ProjectFile::FILE_PATH . '/' . $file->project_id);

        ProjectFile::destroy($id);

        $this->files = ProjectFile::where('project_id', $file->project_id)->orderByDesc('id')->get();

        $view = view('projects.files.show', $this->data)->render();

        return Reply::successWithData(__('messages.deleteSuccess'), ['view' => $view]);
    }

    public function download($id)
    {
        $file = ProjectFile::whereRaw('md5(id) = ?', $id)->firstOrFail();
        $this->viewPermission = user()->permission('view_project_files');
        abort_403(!($this->viewPermission == 'all' || ($this->viewPermission == 'added' && $file->added_by == user()->id)));

        return download_local_s3($file, ProjectFile::FILE_PATH . '/' . $file->project_id . '/' . $file->hashname);

    }

    public function FilesExternal($id)
    {
        
        $url = url()->temporarySignedRoute('external.file.view', now()->addDays(GlobalSetting::SIGNED_ROUTE_EXPIRY),[
            'data' => $id,
        ]);
        $url = getDomainSpecificUrl($url, $this->company);
        return Reply::dataOnly(['status' => 'success', 'url' => $url]);
    }
    public function shareSelectedFiles(Request $request)
    {
        try {
            \Log::info('Share request received:', $request->all());

            $request->validate([
                'files' => 'required|array',
                'files.*' => 'string'
            ]);

            $hashnames = $request->input('files');

            // Fetch all selected files using hashname instead of ID
            $projectFiles = ProjectFile::whereIn('hashname', $hashnames)->get();

            if ($projectFiles->isEmpty()) {
                \Log::warning('No files found for sharing');
                return Reply::error('No matching files found.');
            }

            // Generate a single share token for all files
            $shareToken = \Str::random(40);

            // Assign this token to all selected files
            foreach ($projectFiles as $file) {
                $file->share_token = $shareToken;
                $file->save();
            }

            // Generate a signed URL using hashname
            $url = URL::temporarySignedRoute(
                'shared.files.access',
                now()->addDays(GlobalSetting::SIGNED_ROUTE_EXPIRY),
                ['hashname' => implode(',', $hashnames)]
            );

            \Log::info('Generated shareable signed URL:', ['url' => $url]);

            return Reply::successWithData('Shareable link generated successfully', [
                'status' => 'success',
                'link' => $url
            ]);

        } catch (\Exception $e) {
            \Log::error('File sharing error: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString()
            ]);

            return Reply::error('Failed to generate sharing link: ' . $e->getMessage());
        }
    }

    public function accessSharedFiles(Request $request, $hashname)
    {
        \Log::info("Accessing shared files with hashname: $hashname");

        // Check if signature is valid
        if (!$request->hasValidSignature()) {
            \Log::error("Invalid Signature for: $hashname");
            return response()->json(['error' => 'Invalid or expired link'], 401);
        }

        // Split by comma
        $hashnamesArray = explode(',', $hashname);
        \Log::info(" Extracted Hashnames: ", $hashnamesArray);

        // Fetch files from DB
        $files = DB::table('project_files')->whereIn('hashname', $hashnamesArray)->get();
        
        if ($files->isEmpty()) {
            \Log::warning("No files found for hashname: $hashname");
            return response()->json(['error' => 'No files found'], 404);
        }

        \Log::info(" Files retrieved successfully:", ['files' => $files]);
        return response()->json(['message' => 'Files found', 'files' => $files], 200);
    }

}
