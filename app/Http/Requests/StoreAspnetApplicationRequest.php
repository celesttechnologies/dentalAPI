<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAspnetApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ApplicationName'         => 'required|string|max:255',
            'LoweredApplicationName'  => 'required|string|max:255',
            'Description'             => 'nullable|string',
            'CreatedOn'               => 'nullable|date',
        ];
    }
}