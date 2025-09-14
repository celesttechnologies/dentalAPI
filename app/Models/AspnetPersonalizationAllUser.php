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
 * Class AspnetPersonalizationAllUser
 * 
 * @property string $PathId
 * @property string $PageSettings
 * @property Carbon $LastUpdatedDate
 * 
 * @property AspnetPath $aspnet_path
 *
 * @package App\Models
 */
class AspnetPersonalizationAllUser extends Model
{
	protected $table = 'aspnet_PersonalizationAllUsers';
	protected $primaryKey = 'PathId';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'LastUpdatedDate' => 'datetime'
	];

	protected $fillable = [
		'PageSettings',
		'LastUpdatedDate'
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

	public function aspnet_path()
	{
		return $this->belongsTo(AspnetPath::class, 'PathId');
	}
}
