<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivityInOutDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'DetailID'            => 'sometimes|string|max:255',
            'ActivityHeaderID'    => 'sometimes|string|max:255',
            'Status'              => 'sometimes|string|max:100',
            'CreatedOn'           => 'nullable|date',
            'CreatedBy'           => 'nullable|string|max:255',
        ];
    }
}