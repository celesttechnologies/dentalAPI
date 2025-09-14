<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDOCVersionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'DocumentID' => 'sometimes|string|max:255',
			'VersionNumber' => 'sometimes|string',
			'CategoryID' => 'sometimes|string|max:255',
			'SubCategoryID' => 'sometimes|string|max:255',
			'StatusID' => 'sometimes|string|max:255',
			'PatientID' => 'sometimes|string|max:255',
			'DocumentType' => 'sometimes|string',
			'Description' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'PublishOn' => 'sometimes|string',
			'ExpirationOn' => 'sometimes|string',
			'RelatedVersionID' => 'sometimes|string|max:255',
			'RelatedVersionNumber' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'IsExpired' => 'sometimes|string',
			'FileName' => 'sometimes|string',
			'UploadedFilePath' => 'sometimes|string',
			'PhysicalFilePath' => 'sometimes|string',
			'RefId1' => 'sometimes|string|max:255',
        ];
    }
}