<?php

namespace App\Http\Requests\Lead;

use App\Http\Requests\CoreRequest;


class UpdateVendorRequest extends CoreRequest
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
        $rules['vendor_name'] = 'required';
        $rules['state'] = 'required';
        $rules['city'] = 'required';
        $rules['county'] = 'required';
        $rules['contractor_type'] = 'required';
        $rules['vendor_mobile'] = 'required';
        return $rules;
    }

}
