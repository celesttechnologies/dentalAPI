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
 * Class PatientMedicalHistoryAttribute
 * 
 * @property string $PatientMedicalDetailID
 * @property string $PatientID
 * @property string $MedicalAttributesCategory
 * @property int $MedicalAttributesID
 * @property string|null $MedicalAttributeValue
 * @property string|null $MedicalAttributeText
 * @property Carbon|null $MedicalHistoryDate
 * @property string|null $LastUpdatedBy
 * @property Carbon $LastUpdatedOn
 *
 * @package App\Models
 */
class PatientMedicalHistoryAttribute extends Model
{
	protected $table = 'PatientMedicalHistoryAttribute';
	protected $primaryKey = 'PatientMedicalDetailID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'MedicalAttributesID' => 'int',
		'MedicalHistoryDate' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'PatientID',
		'MedicalAttributesCategory',
		'MedicalAttributesID',
		'MedicalAttributeValue',
		'MedicalAttributeText',
		'MedicalHistoryDate',
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
}
