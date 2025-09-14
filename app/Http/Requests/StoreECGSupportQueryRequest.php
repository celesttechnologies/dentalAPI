<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreECGSupportQueryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'QueryID' => 'required|string|max:255',
			'Name' => 'required|string',
			'EmailId' => 'required|email|max:255',
			'ContactNo' => 'required|string',
			'Query' => 'required|string',
			'ClinicID' => 'required|string|max:255',
			'QueryDate' => 'required|date',
			'City' => 'required|string',
			'IPAddress' => 'required|string',
        ];
    }
}