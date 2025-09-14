<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSMSTemplatesTagRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'SMSTagCode' => 'required|string',
			'SMSTagDescription' => 'required|string',
			'DefaultValue' => 'required|string',
			'SMSTagQuery' => 'required|string',
			'IsDeleted' => 'required|string',
        ];
    }
}