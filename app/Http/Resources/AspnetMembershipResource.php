<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AspnetMembershipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                                    => $this->ApplicationId,
            'password'                              => $this->Password,
            'password_format'                       => $this->PasswordFormat,
            'password_salt'                         => $this->PasswordSalt,
            'mobile_pin'                            => $this->MobilePIN,
            'email'                                 => $this->Email,
            'lowered_email'                         => $this->LoweredEmail,
            'password_question'                     => $this->PasswordQuestion,
            'password_answer'                       => $this->PasswordAnswer,
            'is_approved'                           => $this->IsApproved,
            'is_locked_out'                         => $this->IsLockedOut,
            'created_on'                            => $this->CreateDate ? $this->CreateDate->format('Y-m-d H:i:s') : null,
            'last_login_on'                         => $this->LastLoginDate ? $this->LastLoginDate->format('Y-m-d H:i:s') : null,
            'last_password_changed_on'              => $this->LastPasswordChangedDate ? $this->LastPasswordChangedDate->format('Y-m-d H:i:s') : null,
            'last_lockout_on'                       => $this->LastLockoutDate ? $this->LastLockoutDate->format('Y-m-d H:i:s') : null,
            'failed_password_attempt_count'         => $this->FailedPasswordAttemptCount,
            'failed_password_attempt_window_start'   => $this->FailedPasswordAttemptWindowStart ? $this->FailedPasswordAttemptWindowStart->format('Y-m-d H:i:s') : null,
            'failed_password_answer_attempt_count'   => $this->FailedPasswordAnswerAttemptCount,
            'failed_password_answer_attempt_window_start' => $this->FailedPasswordAnswerAttemptWindowStart ? $this->FailedPasswordAnswerAttemptWindowStart->format('Y-m-d H:i:s') : null,
            'comment'                               => $this->Comment,
        ];
    }
}