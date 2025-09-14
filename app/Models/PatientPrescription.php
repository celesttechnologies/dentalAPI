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
 * Class PatientPrescription
 * 
 * @property string $PatientPrescriptionID
 * @property string $PatientID
 * @property string $ProviderID
 * @property string|null $PrescriptionNote
 * @property Carbon $DateOfPrescription
 * @property Carbon|null $NextFollowUp
 * @property string|null $InvestigationAdvisedIDCSV
 * @property string|null $PatientInvestigationID
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property string|null $rowguid
 * @property bool|null $IsFolloupSMSRequired
 * 
 * @property Collection|PatientDrugsPrescription[] $patient_drugs_prescriptions
 *
 * @package App\Models
 */
class PatientPrescription extends Model
{
	protected $table = 'PatientPrescriptions';
	protected $primaryKey = 'PatientPrescriptionID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'DateOfPrescription' => 'datetime',
		'NextFollowUp' => 'datetime',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'IsFolloupSMSRequired' => 'bool'
	];

	protected $fillable = [
		'PatientID',
		'ProviderID',
		'PrescriptionNote',
		'DateOfPrescription',
		'NextFollowUp',
		'InvestigationAdvisedIDCSV',
		'PatientInvestigationID',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'rowguid',
		'IsFolloupSMSRequired'
	];

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new \App\Scopes\DoctorScope);
		static::creating(function ($model) {
			if (empty($model->PatientPrescriptionID)) {
				$model->PatientPrescriptionID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientPrescriptionID'],
		);
    }

	public function patient_drugs_prescriptions()
	{
		return $this->hasMany(PatientDrugsPrescription::class, 'PatientPrescriptionID');
	}
}
