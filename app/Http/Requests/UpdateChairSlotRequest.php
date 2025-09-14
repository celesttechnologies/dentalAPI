<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChairSlotRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ChairSlotID' => 'sometimes|string|max:255',
            'ChairID'     => 'sometimes|string|max:255',
            'StartDatetime' => 'sometimes|date',
            'EndDateTime' => 'sometimes|date',
            'SlotInterval'=> 'sometimes|integer',
            'CreatedOn'   => 'sometimes|date',
            'CreatedBy'   => 'sometimes|string|max:255',
            'LastUpdatedOn'=> 'nullable|date',
            'LastUpdatedBy'=> 'nullable|string|max:255',
        ];
    }
}