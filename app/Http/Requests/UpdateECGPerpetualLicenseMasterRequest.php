<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateECGPerpetualLicenseMasterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'LicenseKey' => 'sometimes|string',
			'LicenseTypeID' => 'sometimes|string|max:255',
			'LicenseCreatedDate' => 'sometimes|date',
			'LicenseActivatedOn' => 'sometimes|string',
			'LicenseValidityTypeID' => 'sometimes|string|max:255',
			'LicenseDeactivatedOn' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
        ];
    }
}