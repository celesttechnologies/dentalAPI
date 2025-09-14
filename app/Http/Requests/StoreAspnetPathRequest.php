<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAspnetPathRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'PathId'        => 'required|string|max:255',
            'ApplicationId' => 'required|string|max:255',
            'Path'          => 'required|string|max:500',
            'LoweredPath'   => 'required|string|max:500',
            'Description'   => 'nullable|string',
        ];
    }
}