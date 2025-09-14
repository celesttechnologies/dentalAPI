<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmailTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicIID' => 'required|string|max:255',
			'PatientID' => 'required|string|max:255',
			'EmailTypeID' => 'required|email|max:255',
			'EmailTo' => 'required|email|max:255',
			'EmailFrom' => 'required|email|max:255',
			'EmailCC' => 'required|email|max:255',
			'EmailBcc' => 'required|email|max:255',
			'Subject' => 'required|string',
			'MessageText' => 'required|string',
			'EmailAttachmentsID' => 'required|email|max:255',
			'CreatedBy' => 'required|string',
			'CreatedOn' => 'required|string',
			'Status' => 'required|string',
			'SentOn' => 'required|string',
			'IsDeleted' => 'required|string',
			'EmailFromName' => 'required|email|max:255',
			'EmailToName' => 'required|email|max:255',
			'ScheduledOn' => 'required|string',
        ];
    }
}