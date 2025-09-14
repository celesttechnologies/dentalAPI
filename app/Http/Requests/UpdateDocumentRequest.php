<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'DocumentID' => 'sometimes|string|max:255',
            'FileName'   => 'sometimes|string|max:255',
            'FilePath'   => 'sometimes|string',
            'UploadedBy' => 'sometimes|string|max:255',
            'UploadedOn' => 'sometimes|date',
        ];
    }
}