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
 * Class ChairSlot
 * 
 * @property string $ChairSlotID
 * @property string $ChairID
 * @property Carbon|null $StartDatetime
 * @property Carbon|null $EndDateTime
 * @property int|null $SlotInterval
 * @property Carbon $CreatedOn
 * @property string $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * 
 * @property ClinicChair $clinic_chair
 *
 * @package App\Models
 */
class ChairSlot extends Model
{
	protected $table = 'ChairSlots';
	protected $primaryKey = 'ChairSlotID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'StartDatetime' => 'datetime',
		'EndDateTime' => 'datetime',
		'SlotInterval' => 'int',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ChairID',
		'StartDatetime',
		'EndDateTime',
		'SlotInterval',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ChairSlotID)) {
				$model->ChairSlotID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ChairSlotID'],
		);
    }

	public function clinic_chair()
	{
		return $this->belongsTo(ClinicChair::class, 'ChairID');
	}
}
