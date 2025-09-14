<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClinicTVRSSURLMasterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'RSSTitle' => 'sometimes|string',
			'RSSDescription' => 'sometimes|string',
			'RSSURL' => 'sometimes|string',
			'RSSXML' => 'sometimes|string',
			'IsUserConfigurable' => 'sometimes|string',
			'IsOnlineFeed' => 'sometimes|string',
			'IsAutoSync' => 'sometimes|string',
			'SyncFrequency' => 'sometimes|string',
			'LastSyncTime' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
        ];
    }
}