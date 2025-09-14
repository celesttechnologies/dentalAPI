<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCacheLockRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'LockKey'   => 'sometimes|string|max:255',
            'LockedBy'  => 'sometimes|string|max:255',
            'LockedOn'  => 'sometimes|date',
            'ExpiresOn' => 'sometimes|date',
        ];
    }
}