<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDrugRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'required|string|max:255',
			'GenericName' => 'required|string',
			'Contraindications' => 'required|string',
			'Interactions' => 'required|string',
			'AdverseEffects' => 'required|string',
			'OverdozeManagement' => 'required|string',
			'Precautions' => 'required|string',
			'PatientAlerts' => 'required|string',
			'OtherInfo' => 'required|string',
			'LastUpdatedBy' => 'required|date',
			'LastUpdatedOn' => 'required|date',
			'IsDeleted' => 'required|string',
			'CreatedBy' => 'required|string',
			'CreatedOn' => 'required|string',
			'rowguid' => 'required|string|max:255',
        ];
    }
}