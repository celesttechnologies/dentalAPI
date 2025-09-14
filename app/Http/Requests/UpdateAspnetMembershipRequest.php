<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAspnetMembershipRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'UserId'                              => 'sometimes|string|max:255',
            'Password'                            => 'sometimes|string',
            'PasswordFormat'                      => 'sometimes|integer',
            'PasswordSalt'                        => 'sometimes|string',
            'Email'                               => 'sometimes|email',
            'PasswordQuestion'                    => 'nullable|string|max:255',
            'PasswordAnswer'                      => 'nullable|string|max:255',
            'IsApproved'                          => 'sometimes|boolean',
            'IsLockedOut'                         => 'sometimes|boolean',
            'CreateDate'                          => 'sometimes|date',
            'LastLoginDate'                       => 'nullable|date',
            'LastPasswordChangedDate'             => 'nullable|date',
            'FailedPasswordAttemptCount'          => 'sometimes|integer',
            'FailedPasswordAttemptWindowStart'    => 'nullable|date',
            'FailedPasswordAnswerAttemptCount'    => 'sometimes|integer',
            'FailedPasswordAnswerAttemptWindowStart' => 'nullable|date',
            'Comment'                             => 'nullable|string'
        ];
    }
}