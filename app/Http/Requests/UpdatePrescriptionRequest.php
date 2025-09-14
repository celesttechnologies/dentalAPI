<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePrescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'PrescriptionID'  => 'sometimes|string|max:255',
            'PatientID'       => 'sometimes|string|max:255',
            'DoctorID'        => 'sometimes|string|max:255',
            'MedicineDetails' => 'sometimes|string',
            'Dosage'          => 'sometimes|string|max:100',
            'Instructions'    => 'nullable|string',
            'IssuedOn'        => 'sometimes|date',
            'CreatedOn'       => 'nullable|date',
            'CreatedBy'       => 'nullable|string|max:255',
        ];
    }
}