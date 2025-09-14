<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePrescriptionTemplateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PrescriptionTemplateID' => 'sometimes|string|max:255',
			'ClinicId' => 'sometimes|string|max:255',
			'TemplateName' => 'sometimes|string',
			'MedicineId' => 'sometimes|string|max:255',
			'MedicineName' => 'sometimes|string',
			'FrequencyId' => 'sometimes|string|max:255',
			'Dosage' => 'sometimes|string',
			'Duration' => 'sometimes|string',
			'DrugNote' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
			'PrescriptionTemplateMasterID' => 'sometimes|string|max:255',
			'Frequency' => 'sometimes|string',
			'SequenceOrder' => 'sometimes|string',
        ];
    }
}