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
 * Class PatientAllergyAttribute
 * 
 * @property string $PatientAllergyDetailID
 * @property string $PatientID
 * @property string $AllergyAttributesCategory
 * @property int $AllergyAttributesID
 * @property string|null $AllergyAttributeValue
 * @property string|null $AllergyAttributeText
 * @property string|null $LastUpdatedBy
 * @property Carbon $LastUpdatedOn
 * 
 * @property Patient $patient
 *
 * @package App\Models
 */
class PatientAllergyAttribute extends Model
{
	protected $table = 'PatientAllergyAttribute';
	protected $primaryKey = 'PatientAllergyDetailID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'AllergyAttributesID' => 'int',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'PatientID',
		'AllergyAttributesCategory',
		'AllergyAttributesID',
		'AllergyAttributeValue',
		'AllergyAttributeText',
		'LastUpdatedBy',
		'LastUpdatedOn'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->PatientAllergyDetailID)) {
				$model->PatientAllergyDetailID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientAllergyDetailID'],
		);
    }

	public function patient()
	{
		return $this->belongsTo(Patient::class, 'PatientID');
	}
}
