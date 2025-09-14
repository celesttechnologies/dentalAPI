<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersOriginalRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'name' => 'required|string',
			'email' => 'required|email|max:255',
			'email_verified_at' => 'required|email|max:255',
			'password' => 'required|string',
			'remember_token' => 'required|string',
        ];
    }
}