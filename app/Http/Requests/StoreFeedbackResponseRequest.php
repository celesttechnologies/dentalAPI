<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedbackResponseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'required|string|max:255',
			'PatientID' => 'required|string|max:255',
			'ProviderID' => 'required|string|max:255',
			'PatientName' => 'required|string',
			'MobileNumber' => 'required|string',
			'DateOfFeedBack' => 'required|date',
			'IsDeleted' => 'required|string',
			'CreatedBy' => 'required|string',
			'CreatedOn' => 'required|string',
			'UpdatedBy' => 'required|date',
			'UpdatedOn' => 'required|date',
			'Status' => 'required|string',
        ];
    }
}