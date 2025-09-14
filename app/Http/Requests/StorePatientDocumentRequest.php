<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'required|string|max:255',
			'DocumentID' => 'required|string|max:255',
			'PatientTreatmentID' => 'required|string|max:255',
        ];
    }
}