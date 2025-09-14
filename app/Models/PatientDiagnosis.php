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
 * Class PatientDiagnosi
 * 
 * @property string $PatientDiagnosisID
 * @property string $PatientID
 * @property Carbon|null $DateOfDiagnosis
 * @property string|null $ProviderID
 * @property string|null $ChiefComplaint
 * @property string|null $PatientDiagnosisNotes
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property string|null $rowguid
 * 
 * @property Patient $patient
 *
 * @package App\Models
 */
class PatientDiagnosis extends Model
{
	protected $table = 'PatientDiagnosis';
	protected $primaryKey = 'PatientDiagnosisID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'DateOfDiagnosis' => 'datetime',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'PatientID',
		'DateOfDiagnosis',
		'ProviderID',
		'ChiefComplaint',
		'PatientDiagnosisNotes',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'rowguid'
	];

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new \App\Scopes\DoctorScope);
		static::creating(function ($model) {
			if (empty($model->PatientDiagnosisID)) {
				$model->PatientDiagnosisID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientDiagnosisID'],
		);
    }

	public function patient()
	{
		return $this->belongsTo(Patient::class, 'PatientID','PatientID');
	}

}
