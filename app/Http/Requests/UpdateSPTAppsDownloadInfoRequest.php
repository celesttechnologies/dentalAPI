<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSPTAppsDownloadInfoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'username' => 'sometimes|string',
			'ApplicationTypeID' => 'sometimes|string|max:255',
			'DownloadedOn' => 'sometimes|string',
			'IPAddress' => 'sometimes|string',
			'FingerPrint' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
			'rowguid' => 'sometimes|string|max:255',
        ];
    }
}