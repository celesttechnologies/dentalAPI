<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicTVNewsTickerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'required|string|max:255',
			'Title' => 'required|string',
			'NewsTickerText' => 'required|string',
			'PublishedFrom' => 'required|string',
			'PublishedTo' => 'required|string',
			'IsDeleted' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}