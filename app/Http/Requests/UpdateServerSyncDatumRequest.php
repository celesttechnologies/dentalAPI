<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServerSyncDatumRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'sometimes|string|max:255',
			'TableName' => 'sometimes|string',
			'PrimaryKeyColumnName' => 'sometimes|string',
			'PrimaryKeyID' => 'sometimes|string|max:255',
			'rowguid' => 'sometimes|string|max:255',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
			'IsCreatedExported' => 'sometimes|string',
			'IsCreatedExportedOn' => 'sometimes|string',
			'IsLastUpdatedExported' => 'sometimes|date',
			'IsLastUpdatedExportedOn' => 'sometimes|date',
			'RowData' => 'sometimes|string',
        ];
    }
}