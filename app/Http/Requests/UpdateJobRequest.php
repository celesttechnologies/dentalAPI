<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'id'          => 'sometimes|integer',
            'queue'       => 'sometimes|string|max:255',
            'payload'     => 'sometimes|string',
            'attempts'    => 'sometimes|integer',
            'reserved_at' => 'nullable|integer',
            'available_at'=> 'sometimes|integer',
            'created_at'  => 'sometimes|integer',
        ];
    }
}