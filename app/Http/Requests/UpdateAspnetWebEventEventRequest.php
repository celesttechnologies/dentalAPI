<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAspnetWebEventEventRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'EventId'      => 'sometimes|string|max:255',
            'EventTime'    => 'sometimes|date',
            'EventType'    => 'sometimes|string|max:255',
            'EventSequence'=> 'sometimes|integer',
            'Details'      => 'nullable|string',
        ];
    }
}