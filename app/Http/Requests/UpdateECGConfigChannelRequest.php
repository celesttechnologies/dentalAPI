<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateECGConfigChannelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicIDCSV' => 'sometimes|string|max:255',
			'ChannelName' => 'sometimes|string',
			'ChannelDescription' => 'sometimes|string',
			'ChannelTypeID' => 'sometimes|string|max:255',
			'PublishFrom' => 'sometimes|string',
			'PublishTo' => 'sometimes|string',
			'IsActive' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
        ];
    }
}