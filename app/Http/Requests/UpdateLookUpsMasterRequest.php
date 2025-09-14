<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLookUpsMasterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'sometimes|string|max:255',
			'ItemCategory' => 'sometimes|string',
			'ItemCategoryDescription' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'Importance' => 'sometimes|string',
			'LastUpdatedBy' => 'sometimes|date',
			'LastUpdatedOn' => 'sometimes|date',
        ];
    }
}