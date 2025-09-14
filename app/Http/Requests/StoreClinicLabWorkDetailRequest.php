<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicLabWorkDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'LabWorkID' => 'required|string|max:255',
			'LabWorkComponentID' => 'required|string|max:255',
			'SelectedTeeth' => 'required|string',
			'LabWorkComponentCost' => 'required|numeric',
			'IsDeleted' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'lastUpdatedBy' => 'required|date',
        ];
    }
}