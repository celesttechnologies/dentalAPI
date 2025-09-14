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
 * Class AspnetPath
 * 
 * @property string $ApplicationId
 * @property string $PathId
 * @property string $Path
 * @property string $LoweredPath
 * 
 * @property AspnetApplication $aspnet_application
 * @property AspnetPersonalizationAllUser $aspnet_personalization_all_user
 * @property Collection|AspnetPersonalizationPerUser[] $aspnet_personalization_per_users
 *
 * @package App\Models
 */
class AspnetPath extends Model
{
	protected $table = 'aspnet_Paths';
	protected $primaryKey = 'PathId';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'ApplicationId',
		'Path',
		'LoweredPath'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->PathId)) {
				$model->PathId = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PathId'],
		);
    }

	public function aspnet_application()
	{
		return $this->belongsTo(AspnetApplication::class, 'ApplicationId');
	}

	public function aspnet_personalization_all_user()
	{
		return $this->hasOne(AspnetPersonalizationAllUser::class, 'PathId');
	}

	public function aspnet_personalization_per_users()
	{
		return $this->hasMany(AspnetPersonalizationPerUser::class, 'PathId');
	}
}
