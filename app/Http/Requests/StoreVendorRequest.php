<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVendorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
      
    public function rules()
    {
        return [
            'VendorID'    => 'required|string|max:255',
            'Name'        => 'required|string|max:255',
            'ContactInfo' => 'nullable|string',
            'Address'     => 'nullable|string',
            'CreatedOn'   => 'nullable|date'
        ];
    }
}