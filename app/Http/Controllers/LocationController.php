<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Locations;
use Maatwebsite\Excel\Facades\Excel;
use App\Helper\Reply;
use App\Imports\LocationsImport;
use Illuminate\Support\Facades\Log;

class LocationController extends AccountBaseController
{
    public function create()
    {
        
        return view('projects.vendors.create', $this->data);
    }
    public function importLocation()
    {
        return view('app-settings.import-location-settings-modal', $this->data);
    }

    public function importStore(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        Excel::import(new LocationsImport, $request->file('file'));

        return Reply::success(__('messages.updateSuccess'));
    }
    public function getCounties($state)
    {
        $counties = Locations::select('county')->where('state', $state)->distinct()->get();
        return Reply::dataOnly(['counties' => $counties ]);
    }
    public function getCities($county)
    {
        $cities = Locations::select('city')->where('county', $county)->distinct()->get();
        return Reply::dataOnly(['cities' => $cities ]);
    }

}
