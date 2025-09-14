<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientPrescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'required|string|max:255',
			'ProviderID' => 'required|string|max:255',
			'PrescriptionNote' => 'required|string|max:255',
			'DateOfPrescription' => 'required|string|max:255',
			'NextFollowUp' => 'required|string|max:255',
			'InvestigationAdvisedIDCSV' => 'nullable|string|max:255',
			'PatientInvestigationID' => 'nullable|string|max:255',
            'IsDeleted' => 'nullable',
        ];
    }
}