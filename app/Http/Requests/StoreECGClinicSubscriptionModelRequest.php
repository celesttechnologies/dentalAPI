<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreECGClinicSubscriptionModelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'required|string|max:255',
			'SubscriptionPackageID' => 'required|string|max:255',
			'StartDate' => 'required|date',
			'EndDate' => 'required|date',
			'IsCurrentSubscription' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}