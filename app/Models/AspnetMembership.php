<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class AspnetMembership
 * 
 * @property string $ApplicationId
 * @property string $UserId
 * @property string $Password
 * @property int $PasswordFormat
 * @property string $PasswordSalt
 * @property string|null $MobilePIN
 * @property string|null $Email
 * @property string|null $LoweredEmail
 * @property string|null $PasswordQuestion
 * @property string|null $PasswordAnswer
 * @property bool $IsApproved
 * @property bool $IsLockedOut
 * @property Carbon $CreateDate
 * @property Carbon $LastLoginDate
 * @property Carbon $LastPasswordChangedDate
 * @property Carbon $LastLockoutDate
 * @property int $FailedPasswordAttemptCount
 * @property Carbon $FailedPasswordAttemptWindowStart
 * @property int $FailedPasswordAnswerAttemptCount
 * @property Carbon $FailedPasswordAnswerAttemptWindowStart
 * @property string|null $Comment
 * 
 * @property AspnetApplication $aspnet_application
 * @property AspnetUser $aspnet_user
 *
 * @package App\Models
 */
class AspnetMembership extends Model
{
	protected $table = 'aspnet_Membership';
	protected $primaryKey = 'UserId';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'PasswordFormat' => 'int',
		'IsApproved' => 'bool',
		'IsLockedOut' => 'bool',
		'CreateDate' => 'datetime',
		'LastLoginDate' => 'datetime',
		'LastPasswordChangedDate' => 'datetime',
		'LastLockoutDate' => 'datetime',
		'FailedPasswordAttemptCount' => 'int',
		'FailedPasswordAttemptWindowStart' => 'datetime',
		'FailedPasswordAnswerAttemptCount' => 'int',
		'FailedPasswordAnswerAttemptWindowStart' => 'datetime'
	];

	protected $fillable = [
		'ApplicationId',
		'Password',
		'PasswordFormat',
		'PasswordSalt',
		'MobilePIN',
		'Email',
		'LoweredEmail',
		'PasswordQuestion',
		'PasswordAnswer',
		'IsApproved',
		'IsLockedOut',
		'CreateDate',
		'LastLoginDate',
		'LastPasswordChangedDate',
		'LastLockoutDate',
		'FailedPasswordAttemptCount',
		'FailedPasswordAttemptWindowStart',
		'FailedPasswordAnswerAttemptCount',
		'FailedPasswordAnswerAttemptWindowStart',
		'Comment'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->UserId)) {
				$model->UserId = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['UserId'],
		);
    }

	public function aspnet_application()
	{
		return $this->belongsTo(AspnetApplication::class, 'ApplicationId');
	}

	public function aspnet_user()
	{
		return $this->belongsTo(AspnetUser::class, 'UserId');
	}
}
