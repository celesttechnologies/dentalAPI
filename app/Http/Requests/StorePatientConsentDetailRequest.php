<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientConsentDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'required|string|max:255',
			'ProviderID' => 'required|string|max:255',
			'ConsentTypeID' => 'required|string|max:255',
			'ConsentDate' => 'required|date',
			'CPName' => 'required|string',
			'CPRelation' => 'required|string',
			'CPContact' => 'required|string',
			'Advance' => 'required|string',
			'Total' => 'required|string',
			'Installment' => 'required|string',
			'IsDeleted' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
			'rowguid' => 'required|string|max:255',
			'ProcedureTypeID' => 'required|string|max:255',
			'ProcedureName' => 'required|string',
        ];
    }
}