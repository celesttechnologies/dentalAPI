<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSessionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'user_id' => 'required|string|max:255',
			'ip_address' => 'required|string',
			'user_agent' => 'required|string',
			'payload' => 'required|string',
			'last_activity' => 'required|string',
        ];
    }
}