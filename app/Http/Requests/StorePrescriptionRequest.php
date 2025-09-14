<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePrescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'PrescriptionID'  => 'required|string|max:255',
            'PatientID'       => 'required|string|max:255',
            'DoctorID'        => 'required|string|max:255',
            'MedicineDetails' => 'required|string',
            'Dosage'          => 'required|string|max:100',
            'Instructions'    => 'nullable|string',
            'IssuedOn'        => 'required|date',
            'CreatedOn'       => 'nullable|date',
            'CreatedBy'       => 'nullable|string|max:255',
        ];
    }
}