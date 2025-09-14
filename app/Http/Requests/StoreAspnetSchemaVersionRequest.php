<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAspnetSchemaVersionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'CompatibleSchemaVersion' => 'required|string|max:50',
            'IsCurrentVersion'          => 'required|boolean',
        ];
    }
}