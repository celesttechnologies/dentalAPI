<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonalReminderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'nullable|string|max:255',
			'PatientID' => 'nullable|string|max:255',
			'UserID' => 'nullable|string|max:255',
			'ProviderID' => 'nullable|string|max:255',
			'ReminderTypeID' => 'nullable|string|max:255',
			'ReminderDate' => 'nullable|date',
			'ReminderSubject' => 'nullable|string',
			'ReminderDescription' => 'nullable|string',
			'IsDeleted' => 'nullable|string',
			'CreatedBy' => 'nullable|string',
			'CreatedOn' => 'nullable|string',
			'LastUpdatedBy' => 'nullable|date',
			'LastUpdatedOn' => 'nullable|date',
			'rowguid' => 'nullable|string|max:255',
			'StatusId' => 'nullable|string|max:255',
        ];
    }
}