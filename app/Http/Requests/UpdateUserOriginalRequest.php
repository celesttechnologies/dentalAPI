<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserOriginalRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'name' => 'sometimes|string',
			'email' => 'sometimes|email|max:255',
			'password' => 'sometimes|string',
        ];
    }
}