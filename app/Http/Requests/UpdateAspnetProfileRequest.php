<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAspnetProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'UserId'              => 'sometimes|string|max:255',
            'PropertyNames'       => 'sometimes|string',
            'PropertyValuesString'=> 'sometimes|string',
            'PropertyValuesBinary'=> 'nullable|string',
            'LastUpdatedDate'     => 'nullable|date',
        ];
    }
}