<?php

namespace App\Http\Requests\Project;

use App\Http\Requests\CoreRequest;

class StoreCancelledReason extends CoreRequest
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
        return [
            'cancelled_reason' => 'required'
        ];
    }

}
