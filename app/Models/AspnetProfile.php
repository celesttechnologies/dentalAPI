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
 * Class AspnetProfile
 * 
 * @property string $UserId
 * @property string $PropertyNames
 * @property string $PropertyValuesString
 * @property string $PropertyValuesBinary
 * @property Carbon $LastUpdatedDate
 * 
 * @property AspnetUser $aspnet_user
 *
 * @package App\Models
 */
class AspnetProfile extends Model
{
	protected $table = 'aspnet_Profile';
	protected $primaryKey = 'UserId';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'LastUpdatedDate' => 'datetime'
	];

	protected $fillable = [
		'PropertyNames',
		'PropertyValuesString',
		'PropertyValuesBinary',
		'LastUpdatedDate'
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

	public function aspnet_user()
	{
		return $this->belongsTo(AspnetUser::class, 'UserId');
	}
}
