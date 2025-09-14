<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientDOCFolderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'required|string|max:255',
			'Title' => 'required|string',
			'Description' => 'required|string',
			'ParentFolderId' => 'required|string|max:255',
			'FolderTypeId' => 'required|string|max:255',
			'IsDeleted' => 'required|string',
			'CreatedBy' => 'required|string',
			'CreatedOn' => 'required|string',
			'LastUpdatedBy' => 'required|date',
			'LastUpdatedOn' => 'required|date',
			'FolderPath' => 'required|string',
			'PartitionId' => 'required|string|max:255',
			'RowGuid' => 'required|string|max:255',
			'FolderType' => 'required|string',
			'Owner' => 'required|string',
        ];
    }
}