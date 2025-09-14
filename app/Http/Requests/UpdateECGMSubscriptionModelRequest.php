<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateECGMSubscriptionModelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'SubscriptionModelName' => 'sometimes|string',
			'SubscriptionPackageID' => 'sometimes|string|max:255',
			'SubscriptionTypeID' => 'sometimes|string|max:255',
			'OrderNumber' => 'sometimes|string',
			'UsersLimit' => 'sometimes|string',
			'ProvidersLimit' => 'sometimes|string|max:255',
			'PatientsLimit' => 'sometimes|string',
			'AppointmentsLimit' => 'sometimes|string',
			'WAVisitsLimit' => 'sometimes|string',
			'DocumentSpaceLimit' => 'sometimes|string',
			'LicenseModuleCodeCSV' => 'sometimes|string',
			'IsActive' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
        ];
    }
}