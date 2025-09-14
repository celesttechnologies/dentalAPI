<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSMSSituationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'SitutationCode' => 'required|string',
			'SituationDescription' => 'required|string',
			'DetailedTrigerringDeescription' => 'required|string',
			'SituationType' => 'required|string',
			'DependentField1' => 'required|string',
			'DependentField2' => 'required|string',
			'DependentField3' => 'required|string',
			'DependentField4' => 'required|string',
			'IsActive' => 'required|string',
			'isDeleted' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}