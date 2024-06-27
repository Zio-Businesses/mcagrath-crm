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
        $rules['vendor_name'] = 'Required';
        $rules['vendor_email'] = 'Required';
        $rules['vendor_mobile'] = 'Required';
        $rules['company_name'] = 'Required';
        $rules['street_address'] = 'Required';
        $rules['county'] = 'Required';
        $rules['city'] = 'Required';
        $rules['state'] = 'Required';
        $rules['zipcode'] = 'Required';
        $rules['office'] = 'Required';
        $rules['contracttype'] = 'Required';
        $rules['dc'] = 'Required';
        $rules['cc'] = 'Required';
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
        $rules['wc_ins_pn'] = 'nullable';
        $rules['gl_ins_pn'] = 'nullable';
        return $rules;
    }

}
