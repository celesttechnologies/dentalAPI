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
 * Class PatientTreatmentsPlanHeader
 * 
 * @property string $PatientTreatmentPlanHeaderID
 * @property string $PatientID
 * @property string $ProviderID
 * @property string|null $TreatmentPlanName
 * @property float|null $TreatmentCost
 * @property float|null $TreatmentDiscount
 * @property float|null $TreatmentTax
 * @property float|null $TreatmentTotalCost
 * @property Carbon|null $TreatmentDate
 * @property string|null $ProviderInchargeID
 * @property bool|null $IsDeleted
 * @property string|null $AddedBy
 * @property Carbon $AddedOn
 * @property string|null $LastUpdatedBy
 * @property Carbon $LastUpdatedOn
 * @property string|null $rowguid
 * @property bool|null $IsArchived
 * @property string|null $ParentPatientTreatmentDoneID
 * @property float|null $TreatmentAddition
 * @property int|null $TreatmentPlanStatusID
 * 
 * @property Patient $patient
 *
 * @package App\Models
 */
class PatientTreatmentsPlanHeader extends Model
{
	protected $table = 'PatientTreatmentsPlanHeader';
	protected $primaryKey = 'PatientTreatmentPlanHeaderID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'TreatmentCost' => 'float',
		'TreatmentDiscount' => 'float',
		'TreatmentTax' => 'float',
		'TreatmentTotalCost' => 'float',
		'TreatmentDate' => 'datetime',
		'IsDeleted' => 'bool',
		'AddedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'IsArchived' => 'bool',
		'TreatmentAddition' => 'float',
		'TreatmentPlanStatusID' => 'int'
	];

	protected $fillable = [
		'PatientID',
		'ProviderID',
		'TreatmentPlanName',
		'TreatmentCost',
		'TreatmentDiscount',
		'TreatmentTax',
		'TreatmentTotalCost',
		'TreatmentDate',
		'ProviderInchargeID',
		'IsDeleted',
		'AddedBy',
		'AddedOn',
		'LastUpdatedBy',
		'LastUpdatedOn',
		'rowguid',
		'IsArchived',
		'ParentPatientTreatmentDoneID',
		'TreatmentAddition',
		'TreatmentPlanStatusID'
	];

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new \App\Scopes\DoctorScope);
		static::creating(function ($model) {
			if (empty($model->PatientTreatmentPlanHeaderID)) {
				$model->PatientTreatmentPlanHeaderID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientTreatmentPlanHeaderID'],
		);
    }

	public function patient()
	{
		return $this->belongsTo(Patient::class, 'PatientID');
	}

	public function patient_treatments_plan_details()
	{
		return $this->hasMany(PatientTreatmentsPlanDetail::class, 'PatientTreatmentPlanHeaderID');
	}
}
