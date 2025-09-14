<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateECGWebMessageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'RequestIntID' => 'sometimes|string|max:255',
			'RequestTypeID' => 'sometimes|string|max:255',
			'FirstName' => 'sometimes|string',
			'LastName' => 'sometimes|string',
			'Email' => 'sometimes|email|max:255',
			'ContactNumber' => 'sometimes|string',
			'ClinicName' => 'sometimes|string',
			'ClinicAddress' => 'sometimes|string',
			'OtherDetails' => 'sometimes|string',
			'Message' => 'sometimes|string',
			'status' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
        ];
    }
}