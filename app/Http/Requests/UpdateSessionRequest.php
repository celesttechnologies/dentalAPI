<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSessionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'user_id' => 'sometimes|string|max:255',
			'ip_address' => 'sometimes|string',
			'user_agent' => 'sometimes|string',
			'payload' => 'sometimes|string',
			'last_activity' => 'sometimes|string',
        ];
    }
}