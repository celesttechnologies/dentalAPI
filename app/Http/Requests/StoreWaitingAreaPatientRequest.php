<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWaitingAreaPatientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'IsExistingPatient' => 'required|boolean',
			'AppointmentID' => 'nullable|string|max:255',
			'PatientID' => 'required_if:IsExistingPatient,true|string|exists:Patient,PatientID',
			'Title' => 'required_if:IsExistingPatient,false|string|max:255',
            'FirstName' => 'required_if:IsExistingPatient,false|string|max:255',
            'LastName' => 'required_if:IsExistingPatient,false|string|max:255',
			'Mobile' => 'required_if:IsExistingPatient,false|string|max:255',
			'Gender' => 'required_if:IsExistingPatient,false|in:M,F,O',
            'Age' => 'required_if:IsExistingPatient,false|integer|min:0|max:120',
            'Nationality' => 'required_if:IsExistingPatient,false|string|max:255',
			'ProviderID' => 'required|string|max:255',
			'ProviderName' => 'nullable|string|max:255',
			'StartDateTime' => 'sometimes|date',
			'EndDateTime' => 'nullable|date',
			'Comments' => 'nullable|string',
			'Status' => 'nullable|string',
			'ReminderDate' => 'nullable|date',
			'CancelledOn' => 'nullable|string',
			'CancelledBy' => 'nullable|string',
			'CancellationReason' => 'nullable|string',
			'CancellationType' => 'nullable|string',
			'OperationTime' => 'nullable|string',
			'CompleteTime' => 'nullable|string',
			'IsDeleted' => 'nullable|boolean',
			'WaitTime' => 'nullable|string',
			'ChairID' => 'nullable|uuid',
			'CreatedBy' => 'nullable|string',
			'LastUpdatedBy' => 'nullable|string',
			'ArrivalTime' => 'nullable|string',
			'SMSToDoctor' => 'required|boolean',
            'SMSToPatient' => 'required|boolean',
			// 'IsQueueNotificationSMSRequested' => 'required|string',
			// 'QueueNotificationCount' => 'required|string',
        ];
    }
}