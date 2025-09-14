<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateECGPerpetualLicenseMappingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicName' => 'sometimes|string',
			'EmailAddress' => 'sometimes|email|max:255',
			'MobileNumber' => 'sometimes|string',
			'LicenseKey' => 'sometimes|string',
			'FingerPrintCode' => 'sometimes|string',
			'IsActive' => 'sometimes|string',
			'LicenseValidTill' => 'sometimes|string|max:255',
			'LicenseLastSyncedOn' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
        ];
    }
}