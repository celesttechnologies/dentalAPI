<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEcgDoctorIncentiveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicId' => 'required|string|max:255',
			'ProviderId' => 'required|string|max:255',
			'Month' => 'required|string',
			'Year' => 'required|string',
			'TotalIncentiveAmount' => 'required|numeric',
			'IsDeleted' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}