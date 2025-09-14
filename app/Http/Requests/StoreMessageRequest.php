<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'MessageID'  => 'required|string|max:255',
            'SenderID'   => 'required|string|max:255',
            'ReceiverID' => 'required|string|max:255',
            'Content'    => 'required|string',
            'SentOn'     => 'required|date',
        ];
    }
}