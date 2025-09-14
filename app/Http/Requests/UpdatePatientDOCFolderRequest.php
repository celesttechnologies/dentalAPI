<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientDOCFolderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'sometimes|string|max:255',
			'Title' => 'sometimes|string',
			'Description' => 'sometimes|string',
			'ParentFolderId' => 'sometimes|string|max:255',
			'FolderTypeId' => 'sometimes|string|max:255',
			'IsDeleted' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'LastUpdatedBy' => 'sometimes|date',
			'LastUpdatedOn' => 'sometimes|date',
			'FolderPath' => 'sometimes|string',
			'PartitionId' => 'sometimes|string|max:255',
			'RowGuid' => 'sometimes|string|max:255',
			'FolderType' => 'sometimes|string',
			'Owner' => 'sometimes|string',
        ];
    }
}