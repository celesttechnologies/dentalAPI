<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ItemTypeID' => 'required|string|max:255',
			'ItemName' => 'required|string',
			'Manufacturer' => 'nullable|string',
			'Description' => 'required|string',
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