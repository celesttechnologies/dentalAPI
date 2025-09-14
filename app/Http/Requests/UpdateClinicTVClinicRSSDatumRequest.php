<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClinicTVClinicRSSDatumRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'sometimes|string|max:255',
			'NewsTickerRSSMasterID' => 'sometimes|string|max:255',
			'RSSURL' => 'sometimes|string',
			'RSSTitle' => 'sometimes|string',
			'RSSDescription' => 'sometimes|string',
			'RSSXML' => 'sometimes|string',
			'RSSText' => 'sometimes|string',
			'IsUserConfigurable' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
        ];
    }
}