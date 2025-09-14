<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClinicLabWorkDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'LabWorkID' => 'sometimes|string|max:255',
			'LabWorkComponentID' => 'sometimes|string|max:255',
			'SelectedTeeth' => 'sometimes|string',
			'LabWorkComponentCost' => 'sometimes|numeric',
			'IsDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'lastUpdatedBy' => 'sometimes|date',
        ];
    }
}