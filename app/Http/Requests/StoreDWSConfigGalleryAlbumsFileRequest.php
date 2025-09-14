<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDWSConfigGalleryAlbumsFileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'GalleryAlbumID' => 'required|string|max:255',
			'FileName' => 'required|string',
			'UploadedOn' => 'required|string',
			'FileUploadedNameAs' => 'required|string',
        ];
    }
}