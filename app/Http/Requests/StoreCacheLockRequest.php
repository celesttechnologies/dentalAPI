<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCacheLockRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'LockKey'   => 'required|string|max:255',
            'LockedBy'  => 'required|string|max:255',
            'LockedOn'  => 'required|date',
            'ExpiresOn' => 'required|date',
        ];
    }
}