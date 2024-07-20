<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Reply;
use App\Models\PropertyType;
use App\Http\Requests\Project\StorePropertyType;

class PropertyTypeController extends AccountBaseController
{
    public function edit($id)
    {
        $this->propertyType = PropertyType::findOrfail($id);

        return view('project-settings.edit-propertytype', $this->data);
    }

    public function update(StorePropertyType $request, $id)
    {
       
        $type = PropertyType::findOrFail($id);
        $type->property_type = strip_tags($request->property_type);
        $type->save();
        return Reply::success(__('messages.updateSuccess'));
    }
    
    public function destroy($id)
    {
        PropertyType::destroy($id);
        return Reply::success(__('messages.deleteSuccess'));
    }
}
