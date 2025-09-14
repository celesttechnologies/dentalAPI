<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmailTemplateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'sometimes|string|max:255',
			'SituationID' => 'sometimes|string|max:255',
			'EmailCategoryID' => 'sometimes|email|max:255',
			'FromEmailID' => 'sometimes|email|max:255',
			'BCCEmailID' => 'sometimes|email|max:255',
			'SubjectEnglish' => 'sometimes|string',
			'BodyEnglish' => 'sometimes|string',
			'EffectiveDate' => 'sometimes|date',
			'IsDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
        ];
    }
}