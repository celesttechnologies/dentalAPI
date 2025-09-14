<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientExaminationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'sometimes|string|max:255',
			'DateOfDiagnosis' => 'sometimes|date',
			'ProviderID' => 'sometimes|string|max:255',
			'ChiefComplaint' => 'sometimes|string',
			'PatientDiagnosisNotes' => 'sometimes|string',
			'IsDeleted' => 'sometimes|boolean',
			'diagnosis.TreatmentTypeID' => 'sometimes|string',
			'diagnosis.Description' => 'sometimes|string',
            'diagnosis.TeethTreatments' => 'sometimes|string',
			'diagnosis.IsDeleted' => 'sometimes|boolean',
        ];
    }
}