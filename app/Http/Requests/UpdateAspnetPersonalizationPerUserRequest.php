<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAspnetPersonalizationPerUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'PathId'       => 'sometimes|string|max:255',
            'UserId'       => 'sometimes|string|max:255',
            'PageSettings' => 'sometimes|string',
            'LastUpdatedOn'=> 'nullable|date',
        ];
    }
}