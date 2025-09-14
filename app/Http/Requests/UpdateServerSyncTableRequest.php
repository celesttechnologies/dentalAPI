<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServerSyncTableRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'TableName' => 'sometimes|string',
			'PrimaryKey' => 'sometimes|string',
			'IsTobeSync' => 'sometimes|string',
			'SyncOrder' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'LastSyncTime' => 'sometimes|string',
			'LastStatusMessage' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
			'ClinicID' => 'sometimes|string|max:255',
        ];
    }
}