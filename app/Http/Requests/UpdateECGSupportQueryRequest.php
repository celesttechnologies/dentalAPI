<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateECGSupportQueryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'QueryID' => 'sometimes|string|max:255',
			'Name' => 'sometimes|string',
			'EmailId' => 'sometimes|email|max:255',
			'ContactNo' => 'sometimes|string',
			'Query' => 'sometimes|string',
			'ClinicID' => 'sometimes|string|max:255',
			'QueryDate' => 'sometimes|date',
			'City' => 'sometimes|string',
			'IPAddress' => 'sometimes|string',
        ];
    }
}