<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class CacheLock
 * 
 * @property string $key
 * @property string $owner
 * @property int $expiration
 *
 * @package App\Models
 */
class CacheLock extends Model
{
	protected $table = 'cache_locks';
	protected $primaryKey = 'key';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'expiration' => 'int'
	];

	protected $fillable = [
		'owner',
		'expiration'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->key)) {
				$model->key = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['key'],
		);
    }
}
