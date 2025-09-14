<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonalReminderRequest extends FormRequest
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
			'UserID' => 'sometimes|string|max:255',
			'ProviderID' => 'sometimes|string|max:255',
			'ReminderTypeID' => 'sometimes|string|max:255',
			'ReminderDate' => 'sometimes|date',
			'ReminderSubject' => 'sometimes|string',
			'ReminderDescription' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'LastUpdatedBy' => 'sometimes|date',
			'LastUpdatedOn' => 'sometimes|date',
			'rowguid' => 'sometimes|string|max:255',
			'StatusId' => 'sometimes|string|max:255',
        ];
    }
}