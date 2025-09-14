<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicChairRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ChairID'    => 'required|string|max:255',
            'ClinicID'   => 'required|string|max:255',
            'Title'      => 'required|string|max:255',
            'Description'=> 'nullable|string',
            'IsDeleted'  => 'nullable|boolean',
            'CreatedOn'  => 'nullable|date',
            'CreatedBy'  => 'nullable|string|max:255',
            'LastUpdatedOn' => 'nullable|date',
            'LastUpdatedBy' => 'nullable|string|max:255',
        ];
    }
}