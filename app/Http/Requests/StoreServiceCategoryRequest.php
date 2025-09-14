<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'CategoryID'  => 'required|string|max:255',
            'Name'        => 'required|string|max:255',
            'Description' => 'nullable|string',
            'CreatedOn'   => 'nullable|date',
        ];
    }
}