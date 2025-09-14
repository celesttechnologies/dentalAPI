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
 * Class AspnetApplication
 * 
 * @property string $ApplicationName
 * @property string $LoweredApplicationName
 * @property string $ApplicationId
 * @property string|null $Description
 * 
 * @property Collection|AspnetMembership[] $aspnet_memberships
 * @property Collection|AspnetPath[] $aspnet_paths
 * @property Collection|AspnetRole[] $aspnet_roles
 * @property Collection|AspnetUser[] $aspnet_users
 *
 * @package App\Models
 */
class AspnetApplication extends Model
{
	protected $table = 'aspnet_Applications';
	protected $primaryKey = 'ApplicationId';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'ApplicationName',
		'LoweredApplicationName',
		'Description'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ApplicationId)) {
				$model->ApplicationId = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ApplicationId'],
		);
    }

	public function aspnet_memberships()
	{
		return $this->hasMany(AspnetMembership::class, 'ApplicationId');
	}

	public function aspnet_paths()
	{
		return $this->hasMany(AspnetPath::class, 'ApplicationId');
	}

	public function aspnet_roles()
	{
		return $this->hasMany(AspnetRole::class, 'ApplicationId');
	}

	public function aspnet_users()
	{
		return $this->hasMany(AspnetUser::class, 'ApplicationId');
	}
}
