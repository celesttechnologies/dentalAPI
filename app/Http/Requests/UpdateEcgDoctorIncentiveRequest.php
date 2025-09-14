<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEcgDoctorIncentiveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicId' => 'sometimes|string|max:255',
			'ProviderId' => 'sometimes|string|max:255',
			'Month' => 'sometimes|string',
			'Year' => 'sometimes|string',
			'TotalIncentiveAmount' => 'sometimes|numeric',
			'IsDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
        ];
    }
}