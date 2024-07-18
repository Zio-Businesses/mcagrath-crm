<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Reply;
use App\Models\ProjectSubCategory;
use App\Http\Requests\Project\StoreProjectSubCategory;

class ProjectSubCategoryController extends AccountBaseController
{
    public function edit($id)
    {
        $this->projectSubCategory = ProjectSubCategory::findOrfail($id);

        return view('project-settings.edit-subcategory', $this->data);
    }

    public function update(StoreProjectSubCategory $request, $id)
    {
        $subcategory = ProjectSubCategory::findOrFail($id);
        $subcategory->sub_category = strip_tags($request->sub_category);
        $subcategory->save();
        return Reply::success(__('messages.updateSuccess'));
    }
    public function destroy($id)
    {
        ProjectSubCategory::destroy($id);
        return Reply::success(__('messages.deleteSuccess'));
    }
}
