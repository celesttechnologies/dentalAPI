<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSMSSituationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'SitutationCode' => 'sometimes|string',
			'SituationDescription' => 'sometimes|string',
			'DetailedTrigerringDeescription' => 'sometimes|string',
			'SituationType' => 'sometimes|string',
			'DependentField1' => 'sometimes|string',
			'DependentField2' => 'sometimes|string',
			'DependentField3' => 'sometimes|string',
			'DependentField4' => 'sometimes|string',
			'IsActive' => 'sometimes|string',
			'isDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
        ];
    }
}