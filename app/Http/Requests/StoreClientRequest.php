<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ClientID'  => 'required|string|max:255',
            'Name'      => 'required|string|max:255',
            'Email'     => 'required|email',
            'Phone'     => 'nullable|string|max:15',
            'Address'   => 'nullable|string|max:255',
            'CreatedOn' => 'nullable|date',
            'CreatedBy' => 'nullable|string|max:255',
        ];
    }
}