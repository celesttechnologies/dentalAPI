<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDOCVersionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'DocumentID' => 'required|string|max:255',
			'VersionNumber' => 'required|string',
			'CategoryID' => 'required|string|max:255',
			'SubCategoryID' => 'required|string|max:255',
			'StatusID' => 'required|string|max:255',
			'PatientID' => 'required|string|max:255',
			'DocumentType' => 'required|string',
			'Description' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'PublishOn' => 'required|string',
			'ExpirationOn' => 'required|string',
			'RelatedVersionID' => 'required|string|max:255',
			'RelatedVersionNumber' => 'required|string',
			'IsDeleted' => 'required|string',
			'IsExpired' => 'required|string',
			'FileName' => 'required|string',
			'UploadedFilePath' => 'required|string',
			'PhysicalFilePath' => 'required|string',
			'RefId1' => 'required|string|max:255',
        ];
    }
}