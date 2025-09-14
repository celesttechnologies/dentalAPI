<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreECGMSubscriptionModelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'SubscriptionModelName' => 'required|string',
			'SubscriptionPackageID' => 'required|string|max:255',
			'SubscriptionTypeID' => 'required|string|max:255',
			'OrderNumber' => 'required|string',
			'UsersLimit' => 'required|string',
			'ProvidersLimit' => 'required|string|max:255',
			'PatientsLimit' => 'required|string',
			'AppointmentsLimit' => 'required|string',
			'WAVisitsLimit' => 'required|string',
			'DocumentSpaceLimit' => 'required|string',
			'LicenseModuleCodeCSV' => 'required|string',
			'IsActive' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}