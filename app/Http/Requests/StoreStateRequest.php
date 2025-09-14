<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'CountryID' => 'required|string|max:255',
			'StateCode' => 'required|string',
			'StateDesc' => 'required|string',
        ];
    }
}