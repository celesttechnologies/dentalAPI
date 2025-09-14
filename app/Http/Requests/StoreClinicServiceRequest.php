<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicServiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ServiceID'   => 'required|string|max:255',
            'ClinicID'    => 'required|string|max:255',
            'ServiceName' => 'required|string|max:255',
            'Description' => 'nullable|string',
            'Price'       => 'required|numeric',
            'CreatedOn'   => 'nullable|date',
        ];
    }
}