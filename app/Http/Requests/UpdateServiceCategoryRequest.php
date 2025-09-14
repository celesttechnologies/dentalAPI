<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'CategoryID'  => 'sometimes|string|max:255',
            'Name'        => 'sometimes|string|max:255',
            'Description' => 'nullable|string',
            'CreatedOn'   => 'nullable|date',
        ];
    }
}