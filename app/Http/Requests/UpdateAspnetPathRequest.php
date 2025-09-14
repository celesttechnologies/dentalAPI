<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAspnetPathRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'PathId'        => 'sometimes|string|max:255',
            'ApplicationId' => 'sometimes|string|max:255',
            'Path'          => 'sometimes|string|max:500',
            'LoweredPath'   => 'sometimes|string|max:500',
            'Description'   => 'nullable|string',
        ];
    }
}