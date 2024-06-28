<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Helper\Files;
use App\Helper\Reply;
use App\Models\Project;
use App\Scopes\ActiveScope;
use App\Traits\ImportExcel;
use App\Models\Notification;
use App\Models\ContractType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\VendorContract;
use Illuminate\Support\Facades\DB;
use App\Models\ClientDetails;
use App\Models\ClientCategory;
use App\Models\PurposeConsent;
use App\Models\LanguageSetting;
use App\Models\UniversalSearch;
use App\Models\ClientSubCategory;
use App\Models\PurposeConsentUser;
use App\Models\Company;
use App\DataTables\VendorDataTable;
use Carbon\Carbon;
use App\Models\Lead;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use App\Http\Requests\vendor\SaveVendorRequest;
class VendorController extends AccountBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'app.menu.vendors';
        // $this->middleware(function ($request, $next) {
        //     abort_403(!in_array('clients', $this->user->modules));

        //     return $next($request);
        // });
    }
    public function index(VendorDataTable $dataTable)
    {
    //   Log::info(user()->id);
        if (!request()->ajax()) {
            $this->clients = VendorContract::all();
            $this->subcategories = ClientSubCategory::all();
            $this->categories = ClientCategory::all();
            $this->projects = Project::all();
            $this->contracts = ContractType::all();
            $this->countries = countries();
            $this->totalClients = count($this->clients);
        }

        return $dataTable->render('vendors.index', $this->data);
    }
    public function show($id)
    {
        // Log::info($id);
        // $this->client->id = $id;
        // $this->clientLanguage = LanguageSetting::where('language_code', $this->client->locale)->first();
        // $this->viewPermission = user()->permission('view_clients');
        // $this->viewDocumentPermission = user()->permission('view_client_document');

        // if (!$this->client->hasRole('client')) {
        //     abort(404);
        // }

        // abort_403(!($this->viewPermission == 'all'
        //     || ($this->viewPermission == 'added' && $this->client->clientDetails->added_by == user()->id)
        //     || ($this->viewPermission == 'both' && $this->client->clientDetails->added_by == user()->id)));

       

        // $this->clientStats = $this->clientStats($id);
        // $this->projectChart = $this->projectChartData($id);
        // $this->invoiceChart = $this->invoiceChartData($id);

        // $this->earningTotal = Payment::leftJoin('invoices', 'invoices.id', '=', 'payments.invoice_id')
        //     ->leftJoin('projects', 'projects.id', '=', 'payments.project_id')
        //     ->where(function ($q) use ($id) {
        //         $q->where('invoices.client_id', $id);
        //         $q->orWhere('projects.client_id', $id);
        //     })->sum('amount');

        // $this->view = 'vendors.ajax.profile';

        $tab = request('tab');

        // switch ($tab) {
        // case 'projects':
        //     return $this->projects();
        // case 'invoices':
        //     return $this->invoices();
        // case 'payments':
        //     return $this->payments();
        // case 'estimates':
        //     return $this->estimates();
        // case 'creditnotes':
        //     return $this->creditnotes();
        // case 'contacts':
        //     return $this->contacts();
        // case 'orders':
        //     return $this->orders();
        // case 'documents':
        //     abort_403(!($this->viewDocumentPermission == 'all'
        //         || ($this->viewDocumentPermission == 'added' && $this->client->clientDetails->added_by == user()->id)
        //         || ($this->viewDocumentPermission == 'owned' && $this->client->clientDetails->user_id == user()->id)
        //         || ($this->viewDocumentPermission == 'both' && ($this->client->clientDetails->added_by == user()->id || $this->client->clientDetails->user_id == user()->id))));

        //     $this->view = 'clients.ajax.documents';
        //     break;
        // case 'notes':
        //     return $this->notes();
        // case 'tickets':
        //     return $this->tickets();
        // case 'gdpr':
        //     $this->client = User::withoutGlobalScope(ActiveScope::class)->findOrFail($id);
        //     $this->consents = PurposeConsent::with(['user' => function ($query) use ($id) {
        //         $query->where('client_id', $id)
        //             ->orderByDesc('created_at');
        //     }])->get();

        //     return $this->gdpr();
        // default:
            $this->vendorDetail = VendorContract::Find($id);
            $this->pageTitle = $this->vendorDetail->vendor_name;
            $dataArray = json_decode($this->vendorDetail->payment_methods, true); 
            $sanitizedData = array_map(function ($item) {
                return str_replace(['[', ']', ','], '', $item);
            }, $dataArray);
            $this->joinedData= implode(', ', $sanitizedData);
            // if (!is_null($this->clientDetail)) {
            //     $this->clientDetail = $this->clientDetail->withCustomFields();

            //     if ($this->clientDetail->getCustomFieldGroupsWithFields()) {
            //         $this->fields = $this->clientDetail->getCustomFieldGroupsWithFields()->fields;
            //     }
            // }
             

            $this->view = 'vendors.ajax.profile';
            // break;
        //}

        if (request()->ajax()) {
            return $this->returnAjax($this->view);
        }

        $this->activeTab = $tab ?: 'profile';

        return view('vendors.show', $this->data);
    }
    public function edit($id)
    {
        $this->vendor = VendorContract::find($id);
        $this->pageTitle = __('app.update') . ' ' . __('Vendor');
        $this->vendorStatus = VendorContract::getStatus(); 
        $this->view = 'vendors.ajax.edit';
        $this->contracttype = VendorContract::getContractType();
        
        if (request()->ajax()) {
            return $this->returnAjax($this->view);
        }

        return view('vendors.create', $this->data);

    }
    public function update(SaveVendorRequest $request, $id)
    {
        // $v_date = VendorContract::find($id);
        // DB::table('vendor_contracts')
        // ->where('id', $id)
        // ->update([
        
        //     'vendor_name' => $request->vendor_name,
        //     'vendor_email'=>$request->vendor_email,
        //     'company_name'=>$request->company_name,
        //     'street_address'=>$request->street_address,
        //     'city'=>$request->city,
        //     'state'=>$request->state,
        //     'zip_code'=>$request->zipcode,
        //     'office'=>$request->office,
        //     'cell'=>$request->vendor_mobile,
        //     'website'=>$request->website,
        //     'licensed'=>$request->licensed,
        //     'license'=>$request->license,
        //     'license_expiry_date'=>$v_date->license_expiry_date==$request->license_exp ? $request->license_exp:companyToYmd($request->license_exp),
        //     'insured'=>$request->insured,
        //     'gl_insurance_expiry_date'=>$v_date->gl_insurance_expiry_date==$request->gl_ins_exp ? $request->gl_ins_exp:companyToYmd($request->gl_ins_exp),
        //     'gl_insurance_carrier_name'=>$request->gl_ins_cn,
        //     'gl_insurance_carrier_phone'=>$request->gl_ins_cp,
        //     'gl_insurance_carrier_email_address'=>$request->gl_ins_em,
        //     'Workers_comp_available'=>$request->wca,
        //     'wc_insurance_carrier_name'=>$request->wc_ins_cn,
        //     'wc_insurance_carrier_phone'=>$request->wc_ins_cp,
        //     'wc_insurance_carrier_email_address'=>$request->wc_ins_em,
        //     'wc_insurance_expiry_date'=>$v_date->wc_insurance_expiry_date==$request->wc_ins_exp ? $request->wc_ins_exp:$request->wc_ins_exp==null?$request->wc_ins_exp:companyToYmd($request->wc_ins_exp),
        //     'status'=>$request->status,
        //     'payment_methods'=>$request->payment_methods
        // ]);
        $vendor=VendorContract::find($id);
        $vendor->company_name=$request->company_name;
        $vendor->street_address=$request->street_address;
        $vendor->city=$request->city;
        $vendor->state=$request->state;
        $vendor->zip_code=$request->zipcode;
        $vendor->office=$request->office;
        $vendor->cell=$request->vendor_mobile;
        $vendor->vendor_name=$request->vendor_name;
        $vendor->vendor_email=$request->vendor_email;
        $vendor->website=$request->website;
        $vendor->licensed=$request->licensed;
        $vendor->license=$request->license;
        $vendor->license_expiry_date=$request->license_exp==null?$request->license_exp:companyToYmd($request->license_exp);
        $vendor->insured=$request->insured;
        $vendor->gl_insurance_expiry_date=$request->gl_ins_exp==null?$request->gl_ins_exp:companyToYmd($request->gl_ins_exp);
        $vendor->gl_insurance_carrier_name=$request->gl_ins_cn;
        $vendor->gl_insurance_carrier_phone=$request->gl_ins_cp;
        $vendor->gl_insurance_carrier_email_address=$request->gl_ins_em;
        $vendor->Workers_comp_available=$request->wca;
        $vendor->wc_insurance_carrier_name=$request->wc_ins_cn;
        $vendor->wc_insurance_carrier_phone=$request->wc_ins_cp;
        $vendor->wc_insurance_carrier_email_address=$request->wc_ins_em;
        $vendor->wc_insurance_expiry_date=$request->wc_ins_exp==null?$request->wc_ins_exp:companyToYmd($request->wc_ins_exp);
        $vendor->status=$request->status;
        $vendor->payment_methods=$request->payment_methods;
        $vendor->gl_insurance_policy_number=$request->gl_ins_pn;
        $vendor->wc_insurance_policy_number=$request->wc_ins_pn;
        $vendor->county=$request->county;
        if ($request->has('company_logo_delete') ) {
            $filePath='vendor/logo/' . $v_date->company_logo;
            Storage::disk('s3')->delete($filePath);
            $data['company_logo'] = null;
            DB::table('vendor_contracts')->where('id', $id)->update($data);
        }
        if ($request->hasFile('company_logo')) {
            $filePath='vendor/logo/' . $v_date->company_logo;
            Storage::disk('s3')->delete($filePath);
            $data['company_logo'] = Files::uploadLocalOrS3($request->company_logo, 'vendor/logo', 300);
            DB::table('vendor_contracts')->where('id', $id)->update($data);
        }
        $redirectUrl = route('vendors.index');
        $vendor->save();
        return Reply::successWithData(__('messages.updateSuccess'), ['redirectUrl' => $redirectUrl]);
    }
      /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendor = VendorContract::find($id);

        if ($vendor) {
            // Delete the user
            $vendor->delete();

        }

        return Reply::success(__('messages.deleteSuccess'));
    }
    public function companysign(Request $request)
    {  
        $vendor = VendorContract::find($request->id);
        if($vendor){
        if ($request->signature_type == 'signature') {
            $image = $request->signature;  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = str_random(32) . '.' . 'jpg';

            Files::createDirectoryIfNotExist('vendor/company_sign');

            File::put(public_path() . '/' . Files::UPLOAD_FOLDER . '/vendor/company_sign/' . $imageName, base64_decode($image));
            Files::uploadLocalFile($imageName, 'vendor/company_sign', $this->company->id);
        }
        else {
            if ($request->hasFile('image')) {
                $imageName = Files::uploadLocalOrS3($request->image, 'vendor/company_sign', 300);
            }
        }
        $vendor->company_sign=$imageName;
        $vendor->company_sign_date=date("Y-m-d");
        $vendor->save();
        return Reply::success(__('Signed'));
        }
    
    }
    public function download($id)
    {
        Log::info($id);
        $this->contract = VendorContract::findOrFail($id);
        $this->pageTitle = 'app.menu.contracts';
        $this->pageIcon = 'fa fa-file';
        $this->company = Company::find(1);
        $pdf = app('dompdf.wrapper');

        $pdf->setOption('enable_php', true);
        $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

        App::setLocale('en');
        Carbon::setLocale('en');
        $pdf->loadView('vendors.contract-pdf', $this->data);

        $filename = 'contract-' . $this->contract->id;

        return $pdf->download($filename . '.pdf');

    }

}
