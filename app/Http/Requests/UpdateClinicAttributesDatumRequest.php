<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClinicAttributesDatumRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ClinicAttributesDatumID' => 'sometimes|string|max:255',
            'ClinicAttributeMasterID' => 'sometimes|string|max:255',
            'Value'                   => 'sometimes|string',
            'CreatedOn'               => 'nullable|date',
            'CreatedBy'               => 'nullable|string|max:255',
            'LastUpdatedOn'           => 'nullable|date',
            'LastUpdatedBy'           => 'nullable|string|max:255',
            'rowguid'                 => 'nullable|string|max:255',
        ];
    }
}