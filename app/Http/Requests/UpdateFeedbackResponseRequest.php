<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeedbackResponseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'sometimes|string|max:255',
			'PatientID' => 'sometimes|string|max:255',
			'ProviderID' => 'sometimes|string|max:255',
			'PatientName' => 'sometimes|string',
			'MobileNumber' => 'sometimes|string',
			'DateOfFeedBack' => 'sometimes|date',
			'IsDeleted' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'UpdatedBy' => 'sometimes|date',
			'UpdatedOn' => 'sometimes|date',
			'Status' => 'sometimes|string',
        ];
    }
}