<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicAttributesMasterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'AttributeName' => 'required|string|max:255',
            'AttributeDescription' => 'required|string|max:255',
            'Importance'                   => 'required|string',
        ];
    }
}