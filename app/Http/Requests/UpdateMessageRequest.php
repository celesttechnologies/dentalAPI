<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMessageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'MessageID'  => 'sometimes|string|max:255',
            'SenderID'   => 'sometimes|string|max:255',
            'ReceiverID' => 'sometimes|string|max:255',
            'Content'    => 'sometimes|string',
            'SentOn'     => 'sometimes|date',
        ];
    }
}