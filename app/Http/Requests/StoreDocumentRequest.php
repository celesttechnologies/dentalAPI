<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'DocumentID' => 'required|string|max:255',
            'FileName'   => 'required|string|max:255',
            'FilePath'   => 'required|string',
            'UploadedBy' => 'required|string|max:255',
            'UploadedOn' => 'required|date',
        ];
    }
}