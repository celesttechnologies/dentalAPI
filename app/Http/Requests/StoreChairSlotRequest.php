<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChairSlotRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ChairSlotID' => 'required|string|max:255',
            'ChairID'     => 'required|string|max:255',
            'StartDatetime' => 'required|date',
            'EndDateTime' => 'required|date',
            'SlotInterval'=> 'required|integer',
            'CreatedOn'   => 'required|date',
            'CreatedBy'   => 'required|string|max:255',
            'LastUpdatedOn'=> 'nullable|date',
            'LastUpdatedBy'=> 'nullable|string|max:255',
        ];
    }
}