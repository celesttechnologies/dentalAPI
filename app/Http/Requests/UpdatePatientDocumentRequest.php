<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'sometimes|string|max:255',
			'DocumentID' => 'sometimes|string|max:255',
			'PatientTreatmentID' => 'sometimes|string|max:255',
        ];
    }
}