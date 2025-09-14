<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAspnetWebEventEventRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'EventId'      => 'required|string|max:255',
            'EventTime'    => 'required|date',
            'EventType'    => 'required|string|max:255',
            'EventSequence'=> 'required|integer',
            'Details'      => 'nullable|string',
        ];
    }
}