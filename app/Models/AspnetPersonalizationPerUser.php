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
 * Class AspnetPersonalizationPerUser
 * 
 * @property string $Id
 * @property string|null $PathId
 * @property string|null $UserId
 * @property string $PageSettings
 * @property Carbon $LastUpdatedDate
 * 
 * @property AspnetPath|null $aspnet_path
 * @property AspnetUser|null $aspnet_user
 *
 * @package App\Models
 */
class AspnetPersonalizationPerUser extends Model
{
	protected $table = 'aspnet_PersonalizationPerUser';
	protected $primaryKey = 'Id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'LastUpdatedDate' => 'datetime'
	];

	protected $fillable = [
		'PathId',
		'UserId',
		'PageSettings',
		'LastUpdatedDate'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->Id)) {
				$model->Id = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['Id'],
		);
    }

	public function aspnet_path()
	{
		return $this->belongsTo(AspnetPath::class, 'PathId');
	}

	public function aspnet_user()
	{
		return $this->belongsTo(AspnetUser::class, 'UserId');
	}
}
