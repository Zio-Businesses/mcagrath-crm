<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Locations;
use Maatwebsite\Excel\Facades\Excel;
use App\Helper\Reply;
use App\Imports\LocationsImport;
use Illuminate\Support\Facades\Log;

class LocationController extends Controller
{
    public function create()
    {
        
        return view('app-settings.create-location-modal', $this->data);
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
    public function store(Request $request)
    {
        $location = new Locations();
        $location->state=$request->state;
        $location->city=$request->city;
        $location->county=$request->county;
        $location->save();
        return Reply::success(__('Saved'));
    }
    public function edit($id)
    {
        $this->locations=Locations::findOrFail($id);
        return view('app-settings.edit-location-modal', $this->data);
    }
    public function update(Request $request,$id)
    {
        $location = Locations::findOrFail($id);
        $location->state=$request->state;
        $location->city=$request->city;
        $location->county=$request->county;
        $location->save();
        return Reply::success(__('Updated'));
    }
    public function destroy($id)
    {
        Locations::destroy($id);
        return Reply::success(__('messages.deleteSuccess'));
    }

}
