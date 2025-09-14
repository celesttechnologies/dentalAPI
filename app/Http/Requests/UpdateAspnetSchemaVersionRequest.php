<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAspnetSchemaVersionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'CompatibleSchemaVersion' => 'sometimes|string|max:50',
            'IsCurrentVersion'          => 'sometimes|boolean',
        ];
    }
}