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
 * Class PatientExaminationDiagnosi
 * 
 * @property string $PatientExaminationDiagnosisID
 * @property string|null $PatientExaminationID
 * @property int $TreatmentTypeID
 * @property string|null $Description
 * @property string|null $TeethTreatments
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property string|null $rowguid
 *
 * @package App\Models
 */
class PatientExaminationDiagnosis extends Model
{
	protected $table = 'PatientExaminationDiagnosis';
	protected $primaryKey = 'PatientExaminationDiagnosisID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'TreatmentTypeID' => 'int',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'PatientExaminationID',
		'TreatmentTypeID',
		'Description',
		'TeethTreatments',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'rowguid'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->PatientExaminationDiagnosisID)) {
				$model->PatientExaminationDiagnosisID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientExaminationDiagnosisID'],
		);
    }

	public function treatmentType()
	{
		return $this->hasOne(TreatmentTypeHierarchy::class, 'TreatmentTypeID', 'TreatmentTypeID');
	}
}
