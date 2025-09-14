<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientDOCFileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'sometimes|string|max:255',
			'ClinicID' => 'sometimes|string|max:255',
			'DocumentID' => 'sometimes|string|max:255',
			'VersionNumber' => 'sometimes|string',
			'RelatedVersionID' => 'sometimes|string|max:255',
			'RelatedVersionNumber' => 'sometimes|string',
			'FolderId' => 'sometimes|string|max:255',
			'StatusID' => 'sometimes|string|max:255',
			'Description' => 'sometimes|string',
			'FileName' => 'sometimes|string',
			'VirtualFilePath' => 'sometimes|string',
			'PhysicalFilePath' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'LastUpdatedBy' => 'sometimes|date',
			'LastUpdatedOn' => 'sometimes|date',
			'IsDeleted' => 'sometimes|string',
			'PublishOn' => 'sometimes|string',
			'ExpirationOn' => 'sometimes|string',
			'RefId' => 'sometimes|string|max:255',
			'RefId1' => 'sometimes|string|max:255',
			'FileSize' => 'sometimes|string',
			'FileType' => 'sometimes|string',
			'UploadedFileName' => 'sometimes|string',
			'FileThumbImage' => 'sometimes|string',
			'ReferenceNo' => 'sometimes|string',
			'rowguid' => 'sometimes|string|max:255',
        ];
    }
}