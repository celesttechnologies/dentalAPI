<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientConsentDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'sometimes|string|max:255',
			'ProviderID' => 'sometimes|string|max:255',
			'ConsentTypeID' => 'sometimes|string|max:255',
			'ConsentDate' => 'sometimes|date',
			'CPName' => 'sometimes|string',
			'CPRelation' => 'sometimes|string',
			'CPContact' => 'sometimes|string',
			'Advance' => 'sometimes|string',
			'Total' => 'sometimes|string',
			'Installment' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
			'rowguid' => 'sometimes|string|max:255',
			'ProcedureTypeID' => 'sometimes|string|max:255',
			'ProcedureName' => 'sometimes|string',
        ];
    }
}