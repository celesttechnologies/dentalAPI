<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class PatientTreatmentsPlanDetail
 * 
 * @property string $PatientTreatmentPlanDetailID
 * @property string $PatientTreatmentPlanHeaderID
 * @property string $TreatmentTypeID
 * @property string|null $TreatmentSubTypeID
 * @property string|null $TeethTreatment
 * @property string|null $TeethTreatmentNote
 * @property float|null $TreatmentCost
 * @property float|null $Discount
 * @property bool|null $IsDeleted
 * @property bool|null $IsExpanded
 * @property float|null $TreatmentTotalCost
 * @property float|null $TreatmentTax
 * @property float|null $Addition
 *
 * @package App\Models
 */
class PatientTreatmentsPlanDetail extends Model
{
	protected $table = 'PatientTreatmentsPlanDetails';
	protected $primaryKey = 'PatientTreatmentPlanDetailID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'TreatmentCost' => 'float',
		'Discount' => 'float',
		'IsDeleted' => 'bool',
		'IsExpanded' => 'bool',
		'TreatmentTotalCost' => 'float',
		'TreatmentTax' => 'float',
		'Addition' => 'float'
	];

	protected $fillable = [
		'PatientTreatmentPlanHeaderID',
		'TreatmentTypeID',
		'TreatmentSubTypeID',
		'TeethTreatment',
		'TeethTreatmentNote',
		'TreatmentCost',
		'Discount',
		'IsDeleted',
		'IsExpanded',
		'TreatmentTotalCost',
		'TreatmentTax',
		'Addition'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->PatientTreatmentPlanDetailID)) {
				$model->PatientTreatmentPlanDetailID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientTreatmentPlanDetailID'],
		);
    }

	public function PatientTreatmentsPlanHeader()
	{
		return $this->belongsTo(PatientTreatmentsPlanHeader::class, 'PatientTreatmentPlanHeaderID');
	}
}
