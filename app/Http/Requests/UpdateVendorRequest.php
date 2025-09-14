<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVendorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
      
    public function rules()
    {
        return [
            'VendorID'    => 'sometimes|string|max:255',
            'Name'        => 'sometimes|string|max:255',
            'ContactInfo' => 'nullable|string',
            'Address'     => 'nullable|string',
            'CreatedOn'   => 'nullable|date'
        ];
    }
}