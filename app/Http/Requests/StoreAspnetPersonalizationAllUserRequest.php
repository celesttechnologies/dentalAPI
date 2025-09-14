<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAspnetPersonalizationAllUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'PathId'       => 'required|string|max:255',
            'PageSettings' => 'required|string',
            'LastUpdatedOn'=> 'nullable|date',
        ];
    }
}