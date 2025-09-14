<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEcgExternalRefferalDatumRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ExternalRefferalMasterId' => 'required|string|max:255',
			'PatientId' => 'required|string|max:255',
			'ClinicId' => 'required|string|max:255',
			'IsDeleted' => 'required|string',
			'CreatedBy' => 'required|string',
			'CreatedOn' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}