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
			'ClinicID' => 'required|string|max:255',
			'PatientID' => 'required|string|max:255',
			'UserID' => 'required|string|max:255',
			'ProviderID' => 'required|string|max:255',
			'ReminderTypeID' => 'required|string|max:255',
			'ReminderDate' => 'required|date',
			'ReminderSubject' => 'required|string',
			'ReminderDescription' => 'required|string',
			'IsDeleted' => 'required|string',
			'CreatedBy' => 'required|string',
			'CreatedOn' => 'required|string',
			'LastUpdatedBy' => 'required|date',
			'LastUpdatedOn' => 'required|date',
			'rowguid' => 'required|string|max:255',
			'StatusId' => 'required|string|max:255',
        ];
    }
}