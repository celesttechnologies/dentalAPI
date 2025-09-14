<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ItemTypeID' => 'nullable|string|max:255',
			'ItemName' => 'nullable|string',
			'Manufacturer' => 'nullable|string',
			'Description' => 'nullable|string',
			'Measure' => 'nullable|string',
			'UnitOfMeasure' => 'nullable|string',
			'InternalPrescription' => 'nullable|string',
			'MinimumQuantity' => 'nullable|string',
			'MaximumQuantity' => 'nullable|string',
			'ReorderQuantity' => 'nullable|string',
			'Rate' => 'nullable|string',
			'AddedBy' => 'nullable|string',
			'AddedOn' => 'nullable|string',
			'LastUpdatedBy' => 'nullable|date',
			'LastUpdatedOn' => 'nullable|date',
			'IsDeleted' => 'nullable|string',
			'rowguid' => 'nullable|string|max:255',
			'Location' => 'nullable|string',
			'Shelflife' => 'nullable|string',
        ];
    }
}