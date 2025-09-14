<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAspnetApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ApplicationName'         => 'sometimes|string|max:255',
            'LoweredApplicationName'  => 'sometimes|string|max:255',
            'Description'             => 'nullable|string',
            'CreatedOn'               => 'nullable|date',
        ];
    }
}