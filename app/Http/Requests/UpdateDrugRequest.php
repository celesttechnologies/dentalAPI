<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDrugRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'sometimes|string|max:255',
			'GenericName' => 'sometimes|string',
			'Contraindications' => 'sometimes|string',
			'Interactions' => 'sometimes|string',
			'AdverseEffects' => 'sometimes|string',
			'OverdozeManagement' => 'sometimes|string',
			'Precautions' => 'sometimes|string',
			'PatientAlerts' => 'sometimes|string',
			'OtherInfo' => 'sometimes|string',
			'LastUpdatedBy' => 'sometimes|date',
			'LastUpdatedOn' => 'sometimes|date',
			'IsDeleted' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'rowguid' => 'sometimes|string|max:255',
        ];
    }
}