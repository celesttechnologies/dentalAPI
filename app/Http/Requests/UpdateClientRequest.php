<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ClientID'  => 'sometimes|string|max:255',
            'Name'      => 'sometimes|string|max:255',
            'Email'     => 'sometimes|email',
            'Phone'     => 'nullable|string|max:15',
            'Address'   => 'nullable|string|max:255',
            'CreatedOn' => 'nullable|date',
            'CreatedBy' => 'nullable|string|max:255',
        ];
    }
}