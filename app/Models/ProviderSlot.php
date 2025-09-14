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
 * Class ProviderSlot
 * 
 * @property string $ProviderSlotID
 * @property string $ProviderID
 * @property Carbon|null $StartDatetime
 * @property Carbon|null $EndDateTime
 * @property int|null $SlotInterval
 * @property Carbon $CreatedOn
 * @property string $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property string|null $rowguid
 * @property bool|null $IsDeleted
 *
 * @package App\Models
 */
class ProviderSlot extends Model
{
	protected $table = 'ProviderSlots';
	protected $primaryKey = 'ProviderSlotID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'StartDatetime' => 'datetime',
		'EndDateTime' => 'datetime',
		'SlotInterval' => 'int',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'IsDeleted' => 'bool'
	];

	protected $fillable = [
		'ProviderID',
		'StartDatetime',
		'EndDateTime',
		'SlotInterval',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'rowguid',
		'IsDeleted'
	];

protected static function boot()
{
	parent::boot();
	static::addGlobalScope(new \App\Scopes\DoctorScope);
	static::creating(function ($model) {
		if (empty($model->ProviderSlotID)) {
			$model->ProviderSlotID = (string) Str::uuid(); // Auto-generate UUID
		}
	});
}

	protected function id(): Attribute
	{
		return Attribute::make(
			get: fn (mixed $value, array $attributes) => $attributes['ProviderSlotID'],
		);
	}
}
