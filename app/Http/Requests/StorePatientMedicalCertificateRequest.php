<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientMedicalCertificateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'required|string|max:255',
			'ProviderID' => 'required|string|max:255',
			'DateFrom' => 'required|date',
			'DateTo' => 'required|date',
			'Reason' => 'required|string',
			'IsDeleted' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
			'rowguid' => 'required|string|max:255',
			'OutPatientOn' => 'required|string',
			'InPatientFrom' => 'required|string',
			'InPatientTo' => 'required|string',
			'CertificateTypeID' => 'required|string|max:255',
        ];
    }
}