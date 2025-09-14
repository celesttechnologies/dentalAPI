<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:patients,email,' . $this->route('patient'),
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ];
    }
}