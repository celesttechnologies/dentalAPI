<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityInOutHeaderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'HeaderID'     => 'required|string|max:255',
            'UserID'       => 'required|string|max:255',
            'ActivityDate' => 'required|date',
            'Remarks'      => 'nullable|string',
            'CreatedOn'    => 'nullable|date',
            'CreatedBy'    => 'nullable|string|max:255',
        ];
    }
}