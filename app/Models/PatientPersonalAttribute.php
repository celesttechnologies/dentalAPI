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
 * Class PatientPersonalAttribute
 * 
 * @property string $PatientAttributeDataID
 * @property string|null $ClinicID
 * @property string|null $PatientID
 * @property string|null $PatientAttributeID
 * @property string|null $PatientAttributeData
 * @property bool|null $IsDeleted
 * @property string|null $CreatedBy
 * @property Carbon|null $CreatedOn
 * @property string|null $LastUpdatedBy
 * @property Carbon|null $LastUpdatedOn
 *
 * @package App\Models
 */
class PatientPersonalAttribute extends Model
{
	protected $table = 'PatientPersonalAttributes';
	protected $primaryKey = 'PatientAttributeDataID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'PatientID',
		'PatientAttributeID',
		'PatientAttributeData',
		'IsDeleted',
		'CreatedBy',
		'CreatedOn',
		'LastUpdatedBy',
		'LastUpdatedOn'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->PatientAttributeDataID)) {
				$model->PatientAttributeDataID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientAttributeDataID'],
		);
    }
}
