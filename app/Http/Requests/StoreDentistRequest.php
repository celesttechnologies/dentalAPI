<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDentistRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'DentistID'    => 'required|string|max:255',
            'Name'         => 'required|string|max:255',
            'Email'        => 'required|email',
            'Phone'        => 'nullable|string|max:15',
            'Specialization'=> 'required|string|max:255',
            'LicenseNumber'=> 'required|string|max:100',
            'CreatedOn'    => 'nullable|date',
            'CreatedBy'    => 'nullable|string|max:255',
        ];
    }
}