<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\VendorContract;
use App\Helper\Files;
use Illuminate\Support\Facades\File;
class OneTimeAgreeController extends Controller
{
    public function OtaView(Request $request){
        $pageTitle = 'app.menu.contracts';
        $pageIcon = 'fa fa-file';
        $company = Company::find(1);
        $startdate=$request->query('startdate');
        $enddate=$request->query('enddate');
        $name=$request->query('name');
        return view('vendorcontract', [
            'name'=>$name,
            'startdate'=>$startdate,
            'enddate'=>$enddate,
            'company' => $company,
            'pageTitle' => $pageTitle,
            'pageIcon' => $pageIcon,
        ]);
    }
    public function vendorfredirect(Request $request){
        $startDate = $request->input('startdate');
        $endDate = $request->input('enddate');
        $redirectUrl = route('front.formv.show', ['startdate' => $startDate, 'enddate' => $endDate]);
        return response()->json(['redirect_url' => $redirectUrl]);
    }
    public function vendorformshow()
    {

        $pageTitle = 'app.menu.contracts';
        $company = Company::find(1);
         return view('vendorcontactform', [
            
            'company' => $company,
            'pageTitle' => $pageTitle,
            
        ]);
    }
    public function vendorstore(Request $request)
    {
        $vendor=New VendorContract();
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
        $vendor->license_expiry_date=companyToYmd($request->license_exp);
        $vendor->insured=$request->insured;
        $vendor->gl_insurance_expiry_date=companyToYmd($request->gl_ins_exp);
        $vendor->gl_insurance_carrier_name=$request->gl_ins_cn;
        $vendor->gl_insurance_carrier_phone=$request->gl_ins_cp;
        $vendor->gl_insurance_carrier_email_address=$request->gl_ins_em;
        $vendor->Workers_comp_available=$request->wca;
        $vendor->wc_insurance_carrier_name=$request->wc_ins_cn;
        $vendor->wc_insurance_carrier_phone=$request->wc_ins_cp;
        $vendor->wc_insurance_carrier_email_address=$request->wc_ins_em;
        $vendor->wc_insurance_expiry_date=companyToYmd($request->wc_ins_exp);
        if ($request->hasFile('logo')) {
            $logo = Files::uploadLocalOrS3($request->logo, 'vendor/logo', 300);
        }
        if ($request->signature_type == 'signature') {
            $image = $request->signature;  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = str_random(32) . '.' . 'jpg';

            Files::createDirectoryIfNotExist('vendor/sign');

            File::put(public_path() . '/' . Files::UPLOAD_FOLDER . '/vendor/sign/' . $imageName, base64_decode($image));
            Files::uploadLocalFile($imageName, 'vendor/sign', $this->company->id);
        }
        else {
            if ($request->hasFile('image')) {
                $imageName = Files::uploadLocalOrS3($request->image, 'vendor/sign', 300);
            }
        }
        $vendor->contract_sign=$imageName;
        $vendor->company_logo=$logo;
        $vendor->save();
     
    }
}
