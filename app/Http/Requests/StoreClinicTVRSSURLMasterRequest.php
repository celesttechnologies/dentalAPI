<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicTVRSSURLMasterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'RSSTitle' => 'required|string',
			'RSSDescription' => 'required|string',
			'RSSURL' => 'required|string',
			'RSSXML' => 'required|string',
			'IsUserConfigurable' => 'required|string',
			'IsOnlineFeed' => 'required|string',
			'IsAutoSync' => 'required|string',
			'SyncFrequency' => 'required|string',
			'LastSyncTime' => 'required|string',
			'IsDeleted' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}