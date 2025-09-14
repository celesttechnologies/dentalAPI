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
 * Class PatientMedicalAttribute
 * 
 * @property string $PatientMedicalDetailID
 * @property string $PatientID
 * @property Carbon|null $Date
 * @property int|null $MedicalAttributes
 * @property string|null $MedicalAttributesCategory
 * @property string|null $MedicalAttributeValue
 * @property string|null $LastUpdatedBy
 * @property Carbon|null $LastUpdatedOn
 * 
 * @property Patient $patient
 *
 * @package App\Models
 */
class PatientMedicalAttribute extends Model
{
	protected $table = 'PatientMedicalAttributes';
	protected $primaryKey = 'PatientMedicalDetailID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Date' => 'datetime',
		'MedicalAttributes' => 'int',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'PatientID',
		'Date',
		'MedicalAttributes',
		'MedicalAttributesCategory',
		'MedicalAttributeValue',
		'LastUpdatedBy',
		'LastUpdatedOn'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->PatientMedicalDetailID)) {
				$model->PatientMedicalDetailID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientMedicalDetailID'],
		);
    }

	public function patient()
	{
		return $this->belongsTo(Patient::class, 'PatientID');
	}
}
