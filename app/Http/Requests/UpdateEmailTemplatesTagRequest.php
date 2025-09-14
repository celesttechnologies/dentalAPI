<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmailTemplatesTagRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'EmailTagCode' => 'sometimes|email|max:255',
			'EmailTagDescription' => 'sometimes|email|max:255',
			'EmailTagQuery' => 'sometimes|email|max:255',
			'IsDeleted' => 'sometimes|string',
        ];
    }
}