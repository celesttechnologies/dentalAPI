<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientDOCServerDocumentDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'sometimes|string|max:255',
			'PartitionID' => 'sometimes|string|max:255',
			'Title' => 'sometimes|string',
			'Description' => 'sometimes|string',
			'FolderPath' => 'sometimes|string',
			'AbsolutePath' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'Owner' => 'sometimes|string',
			'LastUpdatedBy' => 'sometimes|date',
			'LastUpdatedOn' => 'sometimes|date',
			'RowGuid' => 'sometimes|string|max:255',
        ];
    }
}