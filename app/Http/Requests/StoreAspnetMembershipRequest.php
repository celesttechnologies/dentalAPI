<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAspnetMembershipRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'UserId'                              => 'required|string|max:255',
            'Password'                            => 'required|string',
            'PasswordFormat'                      => 'required|integer',
            'PasswordSalt'                        => 'required|string',
            'Email'                               => 'required|email',
            'PasswordQuestion'                    => 'nullable|string|max:255',
            'PasswordAnswer'                      => 'nullable|string|max:255',
            'IsApproved'                          => 'required|boolean',
            'IsLockedOut'                         => 'required|boolean',
            'CreateDate'                          => 'required|date',
            'LastLoginDate'                       => 'nullable|date',
            'LastPasswordChangedDate'             => 'nullable|date',
            'FailedPasswordAttemptCount'          => 'required|integer',
            'FailedPasswordAttemptWindowStart'    => 'nullable|date',
            'FailedPasswordAnswerAttemptCount'    => 'required|integer',
            'FailedPasswordAnswerAttemptWindowStart' => 'nullable|date',
            'Comment'                             => 'nullable|string'
        ];
    }
}