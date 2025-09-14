<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePrescriptionTemplateMasterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PrescriptionTemplateMasterID' => 'sometimes|string|max:255',
			'PrescriptionTemplateName' => 'sometimes|string',
			'PrescriptionTemplateDesc' => 'sometimes|string',
			'PrescriptionNote' => 'sometimes|string',
			'ClinicID' => 'sometimes|string|max:255',
			'IsDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
        ];
    }
}