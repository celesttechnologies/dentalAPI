<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreECGConfigChannelInformationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ECGChannelID' => 'required|string|max:255',
			'InformationTitle' => 'required|string',
			'TitleLink' => 'required|string',
			'TitleLinkTag' => 'required|string',
			'Description' => 'required|string',
			'OtherLink' => 'required|string',
			'OtherLinkTag' => 'required|string',
			'PublishTill' => 'required|string',
			'IsActive' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}