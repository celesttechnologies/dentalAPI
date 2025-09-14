<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmailTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicIID' => 'sometimes|string|max:255',
			'PatientID' => 'sometimes|string|max:255',
			'EmailTypeID' => 'sometimes|email|max:255',
			'EmailTo' => 'sometimes|email|max:255',
			'EmailFrom' => 'sometimes|email|max:255',
			'EmailCC' => 'sometimes|email|max:255',
			'EmailBcc' => 'sometimes|email|max:255',
			'Subject' => 'sometimes|string',
			'MessageText' => 'sometimes|string',
			'EmailAttachmentsID' => 'sometimes|email|max:255',
			'CreatedBy' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'Status' => 'sometimes|string',
			'SentOn' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'EmailFromName' => 'sometimes|email|max:255',
			'EmailToName' => 'sometimes|email|max:255',
			'ScheduledOn' => 'sometimes|string',
        ];
    }
}