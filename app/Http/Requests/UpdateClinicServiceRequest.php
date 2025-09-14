<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClinicServiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ServiceID'   => 'sometimes|string|max:255',
            'ClinicID'    => 'sometimes|string|max:255',
            'ServiceName' => 'sometimes|string|max:255',
            'Description' => 'nullable|string',
            'Price'       => 'sometimes|numeric',
            'CreatedOn'   => 'nullable|date',
        ];
    }
}