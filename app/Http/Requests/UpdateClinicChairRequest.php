<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClinicChairRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ChairID'    => 'sometimes|string|max:255',
            'ClinicID'   => 'sometimes|string|max:255',
            'Title'      => 'sometimes|string|max:255',
            'Description'=> 'nullable|string',
            'IsDeleted'  => 'nullable|boolean',
            'CreatedOn'  => 'nullable|date',
            'CreatedBy'  => 'nullable|string|max:255',
            'LastUpdatedOn' => 'nullable|date',
            'LastUpdatedBy' => 'nullable|string|max:255',
        ];
    }
}