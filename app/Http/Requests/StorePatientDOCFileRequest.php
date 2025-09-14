<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientDOCFileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'required|string|max:255',
			'ClinicID' => 'required|string|max:255',
			'DocumentID' => 'required|string|max:255',
			'VersionNumber' => 'required|string',
			'RelatedVersionID' => 'required|string|max:255',
			'RelatedVersionNumber' => 'required|string',
			'FolderId' => 'required|string|max:255',
			'StatusID' => 'required|string|max:255',
			'Description' => 'required|string',
			'FileName' => 'required|string',
			'VirtualFilePath' => 'required|string',
			'PhysicalFilePath' => 'required|string',
			'CreatedBy' => 'required|string',
			'CreatedOn' => 'required|string',
			'LastUpdatedBy' => 'required|date',
			'LastUpdatedOn' => 'required|date',
			'IsDeleted' => 'required|string',
			'PublishOn' => 'required|string',
			'ExpirationOn' => 'required|string',
			'RefId' => 'required|string|max:255',
			'RefId1' => 'required|string|max:255',
			'FileSize' => 'required|string',
			'FileType' => 'required|string',
			'UploadedFileName' => 'required|string',
			'FileThumbImage' => 'required|string',
			'ReferenceNo' => 'required|string',
			'rowguid' => 'required|string|max:255',
        ];
    }
}