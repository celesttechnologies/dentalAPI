<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSMSTemplatesTagRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'SMSTagCode' => 'sometimes|string',
			'SMSTagDescription' => 'sometimes|string',
			'DefaultValue' => 'sometimes|string',
			'SMSTagQuery' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
        ];
    }
}