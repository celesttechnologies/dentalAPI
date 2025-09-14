<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProviderSlotRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ProviderID' => 'sometimes|string|max:255',
			'StartDatetime' => 'sometimes|date',
			'EndDateTime' => 'sometimes|date',
			'SlotInterval' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
			'rowguid' => 'sometimes|string|max:255',
			'IsDeleted' => 'sometimes|string',
        ];
    }
}