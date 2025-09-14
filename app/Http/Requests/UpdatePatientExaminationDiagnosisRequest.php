<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientExaminationDiagnosisRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'PatientExaminationID' => 'sometimes|string|max:255',
            'TreatmentTypeID' => 'sometimes|integer',
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