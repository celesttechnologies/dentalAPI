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
 * Class PatientDentalHistoryAttribute
 * 
 * @property string $PatientDentalHistoryAttributeID
 * @property string $PatientID
 * @property string $DentalHistoryAttributesCategory
 * @property int $DentalHistoryAttributeID
 * @property string|null $DentalHistoryAttributeValue
 * @property string|null $DentalHistoryAttributeText
 * @property string|null $LastUpdatedBy
 * @property Carbon $LastUpdatedOn
 * 
 * @property Patient $patient
 *
 * @package App\Models
 */
class PatientDentalHistoryAttribute extends Model
{
	protected $table = 'PatientDentalHistoryAttribute';
	protected $primaryKey = 'PatientDentalHistoryAttributeID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'DentalHistoryAttributeID' => 'int',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'PatientID',
		'DentalHistoryAttributesCategory',
		'DentalHistoryAttributeID',
		'DentalHistoryAttributeValue',
		'DentalHistoryAttributeText',
		'LastUpdatedBy',
		'LastUpdatedOn'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->PatientDentalHistoryAttributeID)) {
				$model->PatientDentalHistoryAttributeID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientDentalHistoryAttributeID'],
		);
    }

	public function patient()
	{
		return $this->belongsTo(Patient::class, 'PatientID');
	}
}
