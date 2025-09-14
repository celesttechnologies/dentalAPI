<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, |array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "PatientCode" => 'nullable|string|max:50',
            "CaseID" => 'nullable|int',
            'ClinicID' => 'required|uuid',
            'ProviderID' => 'required|uuid',
            'Title' => 'required|string|max:50',
            'FirstName' => 'required|string|max:50',
            'LastName' => 'nullable|string|max:50',
            'Gender' => 'nullable|string|in:M,F,O',
            'DOB' => 'nullable|date',
            'AddressLine1' => 'required|string|max:255',
            'AddressLine2' => 'nullable|string|max:255',
            'Street' => 'nullable|string|max:255',
            'Area' => 'nullable|string|max:255',
            'City' => 'required|string|max:50',
            'State' => 'required|string|max:50',
            'ZipCode' => 'required|string|max:50',
            'Country' => 'required|integer',
            'PhoneNumber' => 'nullable|string|max:50',
            'MobileNumber' => 'required|string|max:50',
            'EmailAddress1' => 'required|email|max:100',
            'EmailAddress2' => 'nullable|email|max:100',
            'Status' => 'nullable|integer',
            'Family' => 'nullable|uuid',
            'ReferredBy' => 'nullable|uuid',
            'AbhaID' => 'nullable|string|max:50',
        ];
    }
}
