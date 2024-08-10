<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use App\Models\Company;
use App\Models\VendorWaiverFormTemplate;
use App\Models\VendorContract;
use App\Helper\Reply;

class PublicWaiverFormCotnroller extends Controller
{
    public function fromEncryptedString($value)
    {
            return Crypt::decryptString($value);
    }

    public function WaiverView(Request $request){
        $pageTitle = 'WC Waiver Form';
        $pageIcon = 'fa fa-file';
        $company = Company::find(1);
        try {
            $encryptedData = $request->query('data');
            $decryptedData = json_decode($this->fromEncryptedString($encryptedData), true);
        } catch (\Exception $e) {
            abort(403, 'Invalid or expired link');
        }
        $templateid = VendorWaiverFormTemplate::first();
        $vendorid = VendorContract::findOrFail($decryptedData['vendorid']);
        return view('vendorwaiver', [
            'templateid'=>$templateid,
            'vendorid'=>$vendorid,
            'company' => $company,
            'pageTitle' => $pageTitle,
            'pageIcon' => $pageIcon,         
        ]);
    }

    public function WaiverStore(Request $request){

            if ($request->action == 'accept') {
                $vendor = VendorContract::findOrFail($request->data);
                $vendor->waiver_form_status = 'Signed';
                $vendor->waiver_signed_date = date('Y-m-d');
                $vendor->save();
                return Reply::success(__('Thank You. Your Response Has Been Noted'));
            } 
            elseif ($request->action == 'reject') {
                $vendor = VendorContract::findOrFail($request->data);
                $vendor->waiver_form_status = 'Rejected';
                $vendor->save();
                return Reply::success(__('Thank You. Your Response Has Been Noted'));
            } 
    
        }
}
