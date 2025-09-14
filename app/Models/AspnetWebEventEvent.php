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
 * Class AspnetWebEventEvent
 * 
 * @property string $EventId
 * @property Carbon $EventTimeUtc
 * @property Carbon $EventTime
 * @property string $EventType
 * @property float $EventSequence
 * @property float $EventOccurrence
 * @property int $EventCode
 * @property int $EventDetailCode
 * @property string|null $Message
 * @property string|null $ApplicationPath
 * @property string|null $ApplicationVirtualPath
 * @property string $MachineName
 * @property string|null $RequestUrl
 * @property string|null $ExceptionType
 * @property string|null $Details
 *
 * @package App\Models
 */
class AspnetWebEventEvent extends Model
{
	protected $table = 'aspnet_WebEvent_Events';
	protected $primaryKey = 'EventId';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'EventTimeUtc' => 'datetime',
		'EventTime' => 'datetime',
		'EventSequence' => 'float',
		'EventOccurrence' => 'float',
		'EventCode' => 'int',
		'EventDetailCode' => 'int'
	];

	protected $fillable = [
		'EventTimeUtc',
		'EventTime',
		'EventType',
		'EventSequence',
		'EventOccurrence',
		'EventCode',
		'EventDetailCode',
		'Message',
		'ApplicationPath',
		'ApplicationVirtualPath',
		'MachineName',
		'RequestUrl',
		'ExceptionType',
		'Details'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->EventId)) {
				$model->EventId = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['EventId'],
		);
    }
}
