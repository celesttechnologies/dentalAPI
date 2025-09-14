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
 * Class PatientObservation
 * 
 * @property string $PatientObservationID
 * @property string $PatientID
 * @property int $TreatmentTypeID
 * @property Carbon|null $DateOfHistroy
 * @property string|null $Description
 * @property string|null $TeethTreatments
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property string $ProviderID
 * @property string|null $rowguid
 *
 * @package App\Models
 */
class PatientObservation extends Model
{
	protected $table = 'PatientObservation';
	protected $primaryKey = 'PatientObservationID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'TreatmentTypeID' => 'int',
		'DateOfHistroy' => 'datetime',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'PatientID',
		'TreatmentTypeID',
		'DateOfHistroy',
		'Description',
		'TeethTreatments',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'ProviderID',
		'rowguid'
	];

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new \App\Scopes\DoctorScope);
		static::creating(function ($model) {
			if (empty($model->PatientObservationID)) {
				$model->PatientObservationID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientObservationID'],
		);
    }
}
