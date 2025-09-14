<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreECGPerpetualLicenseMappingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicName' => 'required|string',
			'EmailAddress' => 'required|email|max:255',
			'MobileNumber' => 'required|string',
			'LicenseKey' => 'required|string',
			'FingerPrintCode' => 'required|string',
			'IsActive' => 'required|string',
			'LicenseValidTill' => 'required|string|max:255',
			'LicenseLastSyncedOn' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}