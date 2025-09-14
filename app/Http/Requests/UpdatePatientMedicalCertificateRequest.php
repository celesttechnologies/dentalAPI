<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientMedicalCertificateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'sometimes|string|max:255',
			'ProviderID' => 'sometimes|string|max:255',
			'DateFrom' => 'sometimes|date',
			'DateTo' => 'sometimes|date',
			'Reason' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
			'rowguid' => 'sometimes|string|max:255',
			'OutPatientOn' => 'sometimes|string',
			'InPatientFrom' => 'sometimes|string',
			'InPatientTo' => 'sometimes|string',
			'CertificateTypeID' => 'sometimes|string|max:255',
        ];
    }
}