<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWhatsappSMSTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'WhatsappSMSTransactionID' => 'required|string|max:255',
			'ClinicID' => 'required|string|max:255',
			'PatientID' => 'required|string|max:255',
			'MobileNumber' => 'required|string',
			'MessageText' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'SentStatus' => 'required|string',
			'SentOn' => 'required|string',
			'SentStatusMessage' => 'required|string',
			'SMSSituation' => 'required|string',
        ];
    }
}