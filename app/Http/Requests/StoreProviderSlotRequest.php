<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProviderSlotRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ProviderID' => 'required|string|max:255',
			'StartDatetime' => 'required|date',
			'EndDateTime' => 'required|date',
			'SlotInterval' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
			'rowguid' => 'required|string|max:255',
			'IsDeleted' => 'required|string',
        ];
    }
}