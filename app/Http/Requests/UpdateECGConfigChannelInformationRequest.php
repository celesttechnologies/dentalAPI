<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateECGConfigChannelInformationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ECGChannelID' => 'sometimes|string|max:255',
			'InformationTitle' => 'sometimes|string',
			'TitleLink' => 'sometimes|string',
			'TitleLinkTag' => 'sometimes|string',
			'Description' => 'sometimes|string',
			'OtherLink' => 'sometimes|string',
			'OtherLinkTag' => 'sometimes|string',
			'PublishTill' => 'sometimes|string',
			'IsActive' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
        ];
    }
}