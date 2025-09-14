<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow all authenticated users
    }

    public function rules(): array
    {
        return [
            'IsExistingPatient' => 'required|boolean',
            'PatientID' => 'required_if:IsExistingPatient,true|string|exists:Patient,PatientID',
            'Title' => 'required_if:IsExistingPatient,false|string|max:255',
            'FirstName' => 'required_if:IsExistingPatient,false|string|max:255',
            'LastName' => 'required_if:IsExistingPatient,false|string|max:255',
            'Mobile' => 'required_if:IsExistingPatient,false|string|max:255',
            'Gender' => 'required_if:IsExistingPatient,false|in:M,F,O',
            'Age' => 'required_if:IsExistingPatient,false|integer|min:0|max:120',
            'Nationality' => 'required_if:IsExistingPatient,false|string|max:255',
            'ProviderID' => 'required|string|exists:Provider,ProviderID',
            'StartDateTime' => 'required|date|after_or_equal:today',
            'EndDateTime' => 'required|date|after:StartDateTime',
            'Status' => 'required|string|in:Pending,Active,Scheduled',
            'Comments' => 'nullable|string',
            'SMSToDoctor' => 'required|boolean',
            'SMSToPatient' => 'required|boolean',
        ];
    }
}
