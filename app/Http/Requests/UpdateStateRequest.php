<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'CountryID' => 'sometimes|string|max:255',
			'StateCode' => 'sometimes|string',
			'StateDesc' => 'sometimes|string',
        ];
    }
}