<?php

namespace App\Http\Requests\vendor;

use App\Http\Requests\CoreRequest;


class SaveVendorRequest extends CoreRequest
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

        $rules['website'] = 'nullable';
        $rules['logo'] = 'nullable';
        $rules['gl_ins_exp'] = 'nullable';
        $rules['wc_ins_exp'] = 'nullable';
        $rules['license_exp'] = 'nullable';
        $rules['gl_ins_cn'] = 'nullable';
        $rules['gl_ins_cp'] = 'nullable';
        $rules['gl_ins_em'] = 'nullable';
        $rules['wc_ins_cn'] = 'nullable';
        $rules['wc_ins_cp'] = 'nullable';
        $rules['wc_ins_em'] = 'nullable';
        $rules['license'] = 'nullable';
        return $rules;
    }

}
