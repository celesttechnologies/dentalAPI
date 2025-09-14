<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePrescriptionTemplateMasterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PrescriptionTemplateMasterID' => 'required|string|max:255',
			'PrescriptionTemplateName' => 'required|string',
			'PrescriptionTemplateDesc' => 'required|string',
			'PrescriptionNote' => 'required|string',
			'ClinicID' => 'required|string|max:255',
			'IsDeleted' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}