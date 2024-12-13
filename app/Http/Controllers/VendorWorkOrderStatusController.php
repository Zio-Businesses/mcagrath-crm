<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorWorkOrderStatus;
use App\Helper\Reply;

class VendorWorkOrderStatusController extends AccountBaseController
{
    public function store(Request $request)
    {
        if (VendorWorkOrderStatus::exists())
        {
            $vwos = VendorWorkOrderStatus::first();
            $vwos->vendor_status = $request->value;
            $vwos->save();
            return Reply::success(__('Updated'));      
        }
        else{
            $vwos = new VendorWorkOrderStatus();
            $vwos->vendor_status = $request->value;
            $vwos->save();
            return Reply::success(__('Updated'));  
        }
    }
}
