<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServerSyncDatumRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'required|string|max:255',
			'TableName' => 'required|string',
			'PrimaryKeyColumnName' => 'required|string',
			'PrimaryKeyID' => 'required|string|max:255',
			'rowguid' => 'required|string|max:255',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
			'IsCreatedExported' => 'required|string',
			'IsCreatedExportedOn' => 'required|string',
			'IsLastUpdatedExported' => 'required|date',
			'IsLastUpdatedExportedOn' => 'required|date',
			'RowData' => 'required|string',
        ];
    }
}