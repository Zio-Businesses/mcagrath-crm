<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusLead;
use App\Helper\Reply;

class StatusLeadController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            abort_403(!in_array('leads', auth()->user()->modules));
            return $next($request);
        });
    }

    /**
     * Display a listing of status leads
     */
    public function index()
    {
        $this->statusLeads = StatusLead::all();
        $this->deleteStatusPermission = user()->permission('manage_lead_status');
        return view(['status_leads.index', $this->data,'deleteStatusPermission'=>$deleteStatusPermission]);
    }

    /**
     * Fetch List of Status Leads
     */
    public function getList()
    {
        $statusLeads = StatusLead::all();
        return Reply::dataOnly(['statusLeads' => $statusLeads]);
    }

    /**
     * Show Create Form
     */
    public function create()
    {
        $this->statusLeads = StatusLead::all();
        return view('lead-contact.notes.status', $this->data);
    }

    /**
     * Store New Status Lead
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'status' => 'required|string|max:191|unique:status_leads,status',
        ]);
    
        $statusLead = new StatusLead();
        $statusLead->company_id = $request->company_id;
        $statusLead->status = strip_tags($request->status);
        $statusLead->save();
    
        return Reply::successWithData(__('messages.recordSaved'), [
            'statusLeads' => StatusLead::all()
        ]);
    }
    /**
     * Update Status Lead
     */
    public function update(Request $request, $id)
    {
        $statusLead = StatusLead::findOrFail($id);

        $request->validate([
            'company_id' => 'required',
            'status' => 'required|string|max:191|unique:status_leads,status,' . $id,
        ]);

        $statusLead->company_id = $request->company_id;
        $statusLead->status = strip_tags($request->status);
        $statusLead->save();

        return Reply::success(__('messages.updateSuccess'));
    }

    /**
     * Delete Status Lead
     */
    public function destroy($id)
    {
        
        $statusLead = StatusLead::findOrFail($id);
        $statusLead->relatedRecords()->delete();
        $statusLead->delete();

        return Reply::success(__('messages.deleteSuccess'));
    }
}