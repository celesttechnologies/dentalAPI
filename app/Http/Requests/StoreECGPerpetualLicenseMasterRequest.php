<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreECGPerpetualLicenseMasterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'LicenseKey' => 'required|string',
			'LicenseTypeID' => 'required|string|max:255',
			'LicenseCreatedDate' => 'required|date',
			'LicenseActivatedOn' => 'required|string',
			'LicenseValidityTypeID' => 'required|string|max:255',
			'LicenseDeactivatedOn' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}