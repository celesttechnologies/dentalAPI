<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAspnetProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'UserId'              => 'required|string|max:255',
            'PropertyNames'       => 'required|string',
            'PropertyValuesString'=> 'required|string',
            'PropertyValuesBinary'=> 'nullable|string',
            'LastUpdatedDate'     => 'nullable|date',
        ];
    }
}