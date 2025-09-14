<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientExaminationDiagnosisRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'PatientExaminationID' => 'required|string|max:255',
            'TreatmentTypeID' => 'required|integer',
            'Description' => 'nullable|string',
            'TeethTreatments' => 'nullable|string',
            'IsDeleted' => 'nullable|boolean',
            'CreatedOn' => 'nullable|date',
            'CreatedBy' => 'nullable|string|max:255',
            'LastUpdatedOn' => 'nullable|date',
            'LastUpdatedBy' => 'nullable|string|max:255',
            'rowguid' => 'nullable|string|max:255',
        ];
    }
}