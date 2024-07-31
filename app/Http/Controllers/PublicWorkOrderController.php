<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use App\Models\ProjectVendor;
use App\Models\Project;
use App\Models\ContractTemplate;
use App\Models\VendorContract;
use App\Models\ScopeOfWork;
use App\Helper\Reply;
class PublicWorkOrderController extends Controller
{
    public function fromEncryptedString($value)
    {
            return Crypt::decryptString($value);
    }

    public function WoView(Request $request){
        $pageTitle = 'app.menu.contracts';
        $pageIcon = 'fa fa-file';
        $company = Company::find(1);
        try {
            $encryptedData = $request->query('data');
            $decryptedData = json_decode($this->fromEncryptedString($encryptedData), true);
        } catch (\Exception $e) {
            abort(403, 'Invalid or expired link');
        }
        
        $projectvendor = ProjectVendor::findOrFail($decryptedData['projectvendor']);
        $projectid = Project::findOrFail($decryptedData['projectid']);
        $contractid = ContractTemplate::findOrFail($decryptedData['contractid']);
        $vendorid = VendorContract::findOrFail($decryptedData['vendorid']);
        if($projectvendor->link_status=='Rejected'||$projectvendor->link_status=='Removed')
        {
            return view('errors.link-expired');
        }
        return view('workorder', [
            'projectvendor'=>$projectvendor,
            'projectid'=>$projectid,
            'contractid'=>$contractid,
            'vendorid'=>$vendorid,
            'company' => $company,
            'pageTitle' => $pageTitle,
            'pageIcon' => $pageIcon,
            
        ]);
    }
    public function WoStore(Request $request){

    //    Log::info();
        if ($request->action == 'accept') {
            $projectvendor = ProjectVendor::findOrFail($request->data);
            $projectvendor->link_status='Accepted';
            $projectvendor->accepted_date=date("Y-m-d");
            $projectvendor->save();
            return Reply::success(__('Thank You. Your Response Has Been Noted'));
        } 
        elseif ($request->action == 'reject') {
            $projectvendor = ProjectVendor::findOrFail($request->data);
            $projectvendor->link_status='Rejected';
            $projectvendor->rejected_date=date("Y-m-d");
            $projectvendor->save();
           return Reply::success(__('Thank You For Your Time'));
        } 

    }
}
