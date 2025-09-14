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
 * Class PatientTreatment
 * 
 * @property string $PatientTreatmentID
 * @property string $PatientID
 * @property string $ProviderID
 * @property int $TreatmentTypeID
 * @property string|null $TeethTreatment
 * @property string $TreatmentDetails
 * @property float|null $TreamentCost
 * @property float|null $TreatmentPayment
 * @property float|null $TreatmentBalance
 * @property Carbon|null $TreatmentDate
 * @property string|null $ProviderInchargeID
 * @property bool|null $IsDeleted
 * @property string|null $AddedBy
 * @property Carbon $AddedOn
 * @property string|null $LastUpdatedBy
 * @property Carbon $LastUpdatedOn
 * @property string|null $rowguid
 * 
 * @property Patient $patient
 * @property Collection|PatientSetting[] $patient_settings
 *
 * @package App\Models
 */
class PatientTreatment extends Model
{
	protected $table = 'PatientTreatments';
	protected $primaryKey = 'PatientTreatmentID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'TreatmentTypeID' => 'int',
		'TreamentCost' => 'float',
		'TreatmentPayment' => 'float',
		'TreatmentBalance' => 'float',
		'TreatmentDate' => 'datetime',
		'IsDeleted' => 'bool',
		'AddedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'PatientID',
		'ProviderID',
		'TreatmentTypeID',
		'TeethTreatment',
		'TreatmentDetails',
		'TreamentCost',
		'TreatmentPayment',
		'TreatmentBalance',
		'TreatmentDate',
		'ProviderInchargeID',
		'IsDeleted',
		'AddedBy',
		'AddedOn',
		'LastUpdatedBy',
		'LastUpdatedOn',
		'rowguid'
	];

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new \App\Scopes\DoctorScope);
		static::creating(function ($model) {
			if (empty($model->PatientTreatmentID)) {
				$model->PatientTreatmentID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientTreatmentID'],
		);
    }

	public function patient()
	{
		return $this->belongsTo(Patient::class, 'PatientID');
	}

	public function patient_settings()
	{
		return $this->hasMany(PatientSetting::class, 'PatientTreatmentID');
	}

	
	public function provider()
{
    return $this->belongsTo(Provider::class, 'ProviderID', 'ProviderID');
}

public function completedTreatments()
{
    return $this->hasOne(PatientTreatmentsDone::class, 'PatientTreatmentID', 'PatientTreatmentID');
}

	
}
