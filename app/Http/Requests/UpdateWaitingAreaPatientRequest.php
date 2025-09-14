<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWaitingAreaPatientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'nullable|string|max:255',
			'AppointmentID' => 'nullable|string|max:255',
			'PatientID' => 'nullable|string|max:255',
			'PatientName' => 'nullable|string',
			'PatientPhone' => 'nullable|string',
			'ProviderID' => 'nullable|string|max:255',
			'ProviderName' => 'nullable|string|max:255',
			'StartDateTime' => 'nullable|date',
			'EndDateTime' => 'nullable|date',
			'Comments' => 'nullable|string',
			'Status' => 'nullable|string',
			'ReminderDate' => 'nullable|date',
			'CancelledOn' => 'nullable|string',
			'CancelledBy' => 'nullable|string',
			'CancellationReason' => 'nullable|string',
			'CancellationType' => 'nullable|string',
			'ArrivalTime' => 'nullable|string',
			'OperationTime' => 'nullable|string',
			'CompleteTime' => 'nullable|string',
			'IsDeleted' => 'nullable|boolean',
			'WaitTime' => 'nullable|string',
			'ChairID' => 'nullable|string|max:255',
			'CreatedOn' => 'nullable|string',
			'CreatedBy' => 'nullable|string',
			'LastUpdatedOn' => 'nullable|date',
			'LastUpdatedBy' => 'nullable|date',
			'rowguid' => 'nullable|string|max:255',
			'TokenNumber' => 'nullable|string',
			'IsQueueNotificationSMSRequested' => 'nullable|string',
			'QueueNotificationCount' => 'nullable|string',
        ];
    }
}