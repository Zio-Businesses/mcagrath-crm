<?php

namespace App\Http\Controllers;

use App\Models\CompanyType;
use App\Helper\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class CompanyTypeController extends Controller
{
    public function __construct()
{
    $this->middleware(function ($request, $next) {
        // No permission check
        return $next($request);
    });
}

    /**
     * Display a listing of company types.
     */
    public function index()
    {
        $this->companyTypes = CompanyType::all();
       
        return view('company_types.index', $this->data);
    }

    /**
     * Fetch a list of company types.
     */
    public function getList()
    {
        $companyTypes = CompanyType::all();
        return Reply::dataOnly(['companyTypes' => $companyTypes]);
    }

    /**
     * Show the form for creating a new company type.
     */
    public function create()
    {
        

        $this->companyTypes = CompanyType::all();
        return view('lead-contact.notes.companytype', $this->data);     }

    /**
     * Store a newly created company type.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'type' => 'required|string|max:191|unique:company_types,type',
        ]);
    
        $companyType = new CompanyType();
        $companyType->company_id = $request->company_id;
        $companyType->type = strip_tags($request->type);
        $companyType->save();
    
        return Reply::successWithData(__('messages.recordSaved'), [
            'companyTypes' => CompanyType::all()
        ]);
    }
    /**
     * Update the specified company type.
     */
    public function update(Request $request, $id)
    {
        $companyType = CompanyType::findOrFail($id);
    
        $request->validate([
            'company_id' => 'required',
            'type' => 'required|string|max:191|unique:company_types,type,' . $id,
        ]);
    
        $companyType->company_id = $request->company_id;
        $companyType->type = strip_tags($request->type);
        $companyType->save();
    
        return Reply::success(__('messages.updateSuccess'));
    }
    /**
     * Delete the specified company type.
     */
    public function destroy($id)
    {
        $companyType = CompanyType::findOrFail($id);
        $companyType->delete();

        return Reply::success(__('messages.deleteSuccess'));
    }
}