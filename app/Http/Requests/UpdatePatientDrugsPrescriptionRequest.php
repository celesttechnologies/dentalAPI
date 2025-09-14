<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientDrugsPrescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientPrescriptionID' => 'sometimes|string|max:255',
			'DrugID' => 'sometimes|string|max:255',
			'FrequencyID' => 'sometimes|string|max:255',
			'DosageID' => 'sometimes|string|max:255',
			'Duration' => 'sometimes|string',
			'DrugNote' => 'sometimes|string',
        ];
    }
}