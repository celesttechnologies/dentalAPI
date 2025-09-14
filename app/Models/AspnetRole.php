<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class AspnetRole
 * 
 * @property string $ApplicationId
 * @property string $RoleId
 * @property string $RoleName
 * @property string $LoweredRoleName
 * @property string|null $Description
 * 
 * @property AspnetApplication $aspnet_application
 * @property Collection|AspnetUsersInRole[] $aspnet_users_in_roles
 *
 * @package App\Models
 */
class AspnetRole extends Model
{
	protected $table = 'aspnet_Roles';
	protected $primaryKey = 'RoleId';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'ApplicationId',
		'RoleName',
		'LoweredRoleName',
		'Description'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->RoleId)) {
				$model->RoleId = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['RoleId'],
		);
    }

	public function aspnet_application()
	{
		return $this->belongsTo(AspnetApplication::class, 'ApplicationId');
	}

	public function aspnet_users_in_roles()
	{
		return $this->hasMany(AspnetUsersInRole::class, 'RoleId');
	}
}
