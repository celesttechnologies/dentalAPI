<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityInOutDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'DetailID'            => 'required|string|max:255',
            'ActivityHeaderID'    => 'required|string|max:255',
            'Status'              => 'required|string|max:100',
            'CreatedOn'           => 'nullable|date',
            'CreatedBy'           => 'nullable|string|max:255',
        ];
    }
}