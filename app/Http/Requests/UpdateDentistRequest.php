<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDentistRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'DentistID'    => 'sometimes|string|max:255',
            'Name'         => 'sometimes|string|max:255',
            'Email'        => 'sometimes|email',
            'Phone'        => 'nullable|string|max:15',
            'Specialization'=> 'sometimes|string|max:255',
            'LicenseNumber'=> 'sometimes|string|max:100',
            'CreatedOn'    => 'nullable|date',
            'CreatedBy'    => 'nullable|string|max:255',
        ];
    }
}