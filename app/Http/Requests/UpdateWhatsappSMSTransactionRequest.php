<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWhatsappSMSTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'WhatsappSMSTransactionID' => 'sometimes|string|max:255',
			'ClinicID' => 'sometimes|string|max:255',
			'PatientID' => 'sometimes|string|max:255',
			'MobileNumber' => 'sometimes|string',
			'MessageText' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'SentStatus' => 'sometimes|string',
			'SentOn' => 'sometimes|string',
			'SentStatusMessage' => 'sometimes|string',
			'SMSSituation' => 'sometimes|string',
        ];
    }
}