<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmailTemplatesTagRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'EmailTagCode' => 'required|email|max:255',
			'EmailTagDescription' => 'required|email|max:255',
			'EmailTagQuery' => 'required|email|max:255',
			'IsDeleted' => 'required|string',
        ];
    }
}