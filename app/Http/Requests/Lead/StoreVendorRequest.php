<?php

namespace App\Http\Requests\Lead;

use App\Http\Requests\CoreRequest;


class StoreVendorRequest extends CoreRequest
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
        $rules['vendor_email'] = 'required';
        $rules['vendor_mobile'] = 'required';
        $rules['start_date'] = 'required';
        $rules['end_date'] = 'required';
        return $rules;
    }

}
