<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServerSyncTableRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'TableName' => 'required|string',
			'PrimaryKey' => 'required|string',
			'IsTobeSync' => 'required|string',
			'SyncOrder' => 'required|string',
			'IsDeleted' => 'required|string',
			'LastSyncTime' => 'required|string',
			'LastStatusMessage' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
			'ClinicID' => 'required|string|max:255',
        ];
    }
}