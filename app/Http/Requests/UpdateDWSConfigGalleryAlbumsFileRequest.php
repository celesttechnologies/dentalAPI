<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDWSConfigGalleryAlbumsFileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'GalleryAlbumID' => 'sometimes|string|max:255',
			'FileName' => 'sometimes|string',
			'UploadedOn' => 'sometimes|string',
			'FileUploadedNameAs' => 'sometimes|string',
        ];
    }
}