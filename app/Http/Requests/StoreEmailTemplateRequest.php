<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmailTemplateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'required|string|max:255',
			'SituationID' => 'required|string|max:255',
			'EmailCategoryID' => 'required|email|max:255',
			'FromEmailID' => 'required|email|max:255',
			'BCCEmailID' => 'required|email|max:255',
			'SubjectEnglish' => 'required|string',
			'BodyEnglish' => 'required|string',
			'EffectiveDate' => 'required|date',
			'IsDeleted' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}