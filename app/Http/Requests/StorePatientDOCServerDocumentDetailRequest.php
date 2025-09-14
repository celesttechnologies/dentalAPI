<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientDOCServerDocumentDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'required|string|max:255',
			'PartitionID' => 'required|string|max:255',
			'Title' => 'required|string',
			'Description' => 'required|string',
			'FolderPath' => 'required|string',
			'AbsolutePath' => 'required|string',
			'IsDeleted' => 'required|string',
			'CreatedBy' => 'required|string',
			'CreatedOn' => 'required|string',
			'Owner' => 'required|string',
			'LastUpdatedBy' => 'required|date',
			'LastUpdatedOn' => 'required|date',
			'RowGuid' => 'required|string|max:255',
        ];
    }
}