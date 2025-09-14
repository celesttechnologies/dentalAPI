<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class ClinicChair
 * 
 * @property string $ChairID
 * @property string|null $ClinicID
 * @property string|null $Title
 * @property string|null $Description
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * 
 * @property Collection|ChairSlot[] $chair_slots
 *
 * @package App\Models
 */
class ClinicChair extends Model
{
	protected $table = 'ClinicChairs';
	protected $primaryKey = 'ChairID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'Title',
		'Description',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ChairID)) {
				$model->ChairID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ChairID'],
		);
    }

	public function chair_slots()
	{
		return $this->hasMany(ChairSlot::class, 'ChairID');
	}
}
