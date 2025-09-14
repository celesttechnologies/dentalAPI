<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientExaminationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'required|string|max:255',
			'DateOfDiagnosis' => 'required|date',
			'ProviderID' => 'required|string|max:255',
			'ChiefComplaint' => 'nullable|string',
			'PatientDiagnosisNotes' => 'nullable|string',
			'diagnosis.TreatmentTypeID' => 'required|string',
			'diagnosis.Description' => 'required|string',
            'diagnosis.TeethTreatments' => 'required|string',
        ];
    }
}