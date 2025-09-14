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
 * Class PatientDentalHistory
 * 
 * @property string $PatientDentalHistoryID
 * @property string $PatientID
 * @property string $TreatmentTypeID
 * @property string|null $Notes
 * @property string|null $TeethTreatments
 * @property bool|null $IsDeleted
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property string $rowguid
 *
 * @package App\Models
 */
class PatientDentalHistory extends Model
{
	protected $table = 'PatientDentalHistory';
	protected $primaryKey = 'PatientDentalHistoryID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsDeleted' => 'bool',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'PatientID',
		'TreatmentTypeID',
		'Notes',
		'TeethTreatments',
		'IsDeleted',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'rowguid'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->PatientDentalHistoryID)) {
				$model->PatientDentalHistoryID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientDentalHistoryID'],
		);
    }
}
