<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorContract;
use App\Models\VendorModuleNotes;
use App\Http\Requests\vendor\StoreVendorModuleNoteRequest;
use Illuminate\Support\Facades\Log;
use App\Helper\Reply;
use App\Models\NotesTitle;

class VendorModuleNotesController extends AccountBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Add Vendor Note';
        $this->middleware(function ($request, $next) {
            abort_403(!in_array('projects', $this->user->modules));
            return $next($request);
        });
    }

    public function create()
    {
        
        $this->vendors = VendorContract::findOrFail(request('vendorid'));

        $this->notestitle=NotesTitle::all();
        $this->view = 'vendors.notes.create';

        if (request()->ajax()) {
            return $this->returnAjax($this->view);
        }

        return view('vendors.create', $this->data);
    }
    public function show($id)
    {

        $this->note = VendorModuleNotes::findOrFail($id);

        $this->pageTitle = $this->note->notes_title;

        $this->view = 'vendors.notes.show';

        if (request()->ajax()) {
            return $this->returnAjax($this->view);
        }

        return view('vendors.create', $this->data);

    }

    public function store(StoreVendorModuleNoteRequest $request)
    {
  
        $note = new VendorModuleNotes();
        $note->notes_title = $request->notes_title;
        $note->notes_content= $request->details;
        $note->vendor_module_id=$request->vendors_id;
        $note->created_by=user()->name;
        $note->save();

        return Reply::successWithData(__('messages.recordSaved'), ['redirectUrl' => route('vendors.show', $note->vendor_module_id) . '?tab=notes']);
    }
    public function edit($id)
    {
       
        $this->note = VendorModuleNotes::findOrFail($id);
        
        $this->pageTitle = __('Edit Vendor Note');
        $this->notestitle=NotesTitle::all();
        $this->view = 'vendors.notes.edit';

        if (request()->ajax()) {
            return $this->returnAjax($this->view);
        }

        return view('vendors.create', $this->data);
    }

    public function update(StoreVendorModuleNoteRequest $request, $id)
    {
        $note = VendorModuleNotes::findOrFail($id);
        $note->notes_title = $request->notes_title;
        $note->notes_content= $request->details;
        $note->edited_by=user()->name;
        $note->save();

        return Reply::successWithData(__('messages.recordSaved'), ['redirectUrl' => route('vendors.show', $note->vendor_module_id) . '?tab=notes']);

    }
    
    public function destroy($id)
    {
        VendorModuleNotes::destroy($id);
        return Reply::success(__('messages.deleteSuccess'));
    }
}
