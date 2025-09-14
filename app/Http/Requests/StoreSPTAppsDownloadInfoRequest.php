<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSPTAppsDownloadInfoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'username' => 'required|string',
			'ApplicationTypeID' => 'required|string|max:255',
			'DownloadedOn' => 'required|string',
			'IPAddress' => 'required|string',
			'FingerPrint' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
			'rowguid' => 'required|string|max:255',
        ];
    }
}