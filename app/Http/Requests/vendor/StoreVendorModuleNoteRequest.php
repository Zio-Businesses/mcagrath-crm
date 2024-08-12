<?php

namespace App\Http\Requests\vendor;

use App\Http\Requests\CoreRequest;


class StoreVendorModuleNoteRequest extends CoreRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        $rules = array();
        $rules['notes_title'] = 'Required';
        return $rules;
    }

}
