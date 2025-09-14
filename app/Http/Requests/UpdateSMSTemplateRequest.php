<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSMSTemplateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'SituationID' => 'nullable|string|max:255',
			'SMSCategoryID' => 'nullable|string|max:255',
			'FromPhoneNumber' => 'nullable|string',
			'FromSenderID' => 'nullable|string|max:255',
			'Message' => 'nullable|string',
			'EffectiveDate' => 'nullable|date',
			'IsDeleted' => 'nullable|string',
        ];
    }
}