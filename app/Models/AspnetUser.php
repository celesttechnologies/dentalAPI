<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class AspnetUser
 * 
 * @property string $ApplicationId
 * @property string $UserId
 * @property string $UserName
 * @property string $LoweredUserName
 * @property string|null $MobileAlias
 * @property bool $IsAnonymous
 * @property Carbon $LastActivityDate
 * @property string|null $ClinicID
 * @property string|null $ClientID
 * 
 * @property AspnetApplication $aspnet_application
 * @property AspnetMembership $aspnet_membership
 * @property Collection|AspnetPersonalizationPerUser[] $aspnet_personalization_per_users
 * @property AspnetProfile $aspnet_profile
 * @property Collection|AspnetUsersInRole[] $aspnet_users_in_roles
 *
 * @package App\Models
 */
class AspnetUser extends Model
{
	protected $table = 'aspnet_Users';
	protected $primaryKey = 'UserId';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsAnonymous' => 'bool',
		'LastActivityDate' => 'datetime'
	];

	protected $fillable = [
		'ApplicationId',
		'UserName',
		'LoweredUserName',
		'MobileAlias',
		'IsAnonymous',
		'LastActivityDate',
		'ClinicID',
		'ClientID'
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

	public function aspnet_membership()
	{
		return $this->hasOne(AspnetMembership::class, 'UserId');
	}

	public function aspnet_personalization_per_users()
	{
		return $this->hasMany(AspnetPersonalizationPerUser::class, 'UserId');
	}

	public function aspnet_profile()
	{
		return $this->hasOne(AspnetProfile::class, 'UserId');
	}

	public function aspnet_users_in_roles()
	{
		return $this->hasMany(AspnetUsersInRole::class, 'UserId');
	}
}
