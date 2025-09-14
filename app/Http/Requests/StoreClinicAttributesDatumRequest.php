<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicAttributesDatumRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ClinicAttributesDatumID' => 'required|string|max:255',
            'ClinicAttributeMasterID' => 'required|string|max:255',
            'Value'                   => 'required|string',
            'CreatedOn'               => 'nullable|date',
            'CreatedBy'               => 'nullable|string|max:255',
            'LastUpdatedOn'           => 'nullable|date',
            'LastUpdatedBy'           => 'nullable|string|max:255',
            'rowguid'                 => 'nullable|string|max:255',
        ];
    }
}