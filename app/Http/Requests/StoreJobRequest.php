<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'id'          => 'required|integer',
            'queue'       => 'required|string|max:255',
            'payload'     => 'required|string',
            'attempts'    => 'required|integer',
            'reserved_at' => 'nullable|integer',
            'available_at'=> 'required|integer',
            'created_at'  => 'required|integer',
        ];
    }
}