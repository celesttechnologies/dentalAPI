<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSMSTemplateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'SituationID' => 'required|string|max:255',
			'SMSCategoryID' => 'required|string|max:255',
			'FromPhoneNumber' => 'required|string',
			'FromSenderID' => 'required|string|max:255',
			'Message' => 'required|string',
			'EffectiveDate' => 'required|date',
        ];
    }
}