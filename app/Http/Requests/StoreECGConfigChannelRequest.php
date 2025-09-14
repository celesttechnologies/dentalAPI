<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreECGConfigChannelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicIDCSV' => 'required|string|max:255',
			'ChannelName' => 'required|string',
			'ChannelDescription' => 'required|string',
			'ChannelTypeID' => 'required|string|max:255',
			'PublishFrom' => 'required|string',
			'PublishTo' => 'required|string',
			'IsActive' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}