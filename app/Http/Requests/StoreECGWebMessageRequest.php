<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreECGWebMessageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'RequestIntID' => 'required|string|max:255',
			'RequestTypeID' => 'required|string|max:255',
			'FirstName' => 'required|string',
			'LastName' => 'required|string',
			'Email' => 'required|email|max:255',
			'ContactNumber' => 'required|string',
			'ClinicName' => 'required|string',
			'ClinicAddress' => 'required|string',
			'OtherDetails' => 'required|string',
			'Message' => 'required|string',
			'status' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}