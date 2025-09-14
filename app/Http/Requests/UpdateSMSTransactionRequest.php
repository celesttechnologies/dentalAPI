<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSMSTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'sometimes|string|max:255',
			'ReferenceCode' => 'sometimes|string',
			'PatientID' => 'sometimes|string|max:255',
			'SMSTypeID' => 'sometimes|string|max:255',
			'MobileNumber' => 'sometimes|string',
			'MessageText' => 'sometimes|string',
			'ScheduledOn' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'SentStatus' => 'sometimes|string',
			'SentOn' => 'sometimes|string',
			'SentStatusMessage' => 'sometimes|string',
			'IsPromotional' => 'sometimes|string',
        ];
    }
}