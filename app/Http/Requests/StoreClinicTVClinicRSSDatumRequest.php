<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicTVClinicRSSDatumRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'required|string|max:255',
			'NewsTickerRSSMasterID' => 'required|string|max:255',
			'RSSURL' => 'required|string',
			'RSSTitle' => 'required|string',
			'RSSDescription' => 'required|string',
			'RSSXML' => 'required|string',
			'RSSText' => 'required|string',
			'IsUserConfigurable' => 'required|string',
			'IsDeleted' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}