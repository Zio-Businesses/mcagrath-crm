<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NotesTitle;
use App\Http\Requests\Lead\StoreNotesTitle;
use App\Helper\Reply;

class NotesTitleController extends AccountBaseController
{
    public function create()
    {
        $viewPermission = user()->permission('add_lead_category');
        abort_403(!in_array($viewPermission, ['all', 'added']));
        return view('lead-settings.create-notestitle-modal', $this->data);
    }
    public function store(StoreNotesTitle $request)
    {
        
        $nt = new NotesTitle();
        $nt->notes_title = $request->notes_title;
        $nt->save();
        return Reply::success(__('messages.recordSaved'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->notes = NotesTitle::findOrFail($id);
        return view('lead-settings.edit-notes-title-modal', $this->data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreNotesTitle $request, $id)
    {
        $nt = NotesTitle::findOrFail($id);
       
        $nt->notes_title = $request->notes_title;
        $nt->save();
        return Reply::success(__('messages.recordSaved'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return array
     */
    public function destroy($id)
    {
        $nt = NotesTitle::findOrFail($id);
        NotesTitle::destroy($id);
        return Reply::success(__('messages.deleteSuccess'));

    }
}
