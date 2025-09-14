<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientDrugsPrescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientPrescriptionID' => 'required|string|max:255',
			'DrugID' => 'required|string|max:255',
			'FrequencyID' => 'required|string|max:255',
			'DosageID' => 'required|string|max:255',
			'Duration' => 'required|string',
			'DrugNote' => 'required|string',
        ];
    }
}