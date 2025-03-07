<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreVendorEstimates extends FormRequest
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

    protected function prepareForValidation()
    {
        if ($this->estimate_number && is_numeric($this->estimate_number)) {
            $this->merge([
                'estimate_number' => \App\Helper\NumberFormat::estimate($this->estimate_number),
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'estimate_number' => [
                'required',
                /** @phpstan-ignore-next-line */
                Rule::unique('vendor_estimates')->where('company_id', company()->id)
                    ->when($this->route('estimate'), function ($q) {
                        /** @phpstan-ignore-next-line */
                        $q->where('id', '<>', $this->route('estimate'));
                    })
            ],
            'valid_till' => 'required',
            'sub_total' => 'required',
            'total' => 'required',
            'currency_id' => 'required'
        ];


        return $rules;
    }

}
