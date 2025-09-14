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
 * Class PatientMedicalCertificate
 * 
 * @property string $PatientMedicalCertificateID
 * @property string $PatientID
 * @property string $ProviderID
 * @property Carbon $DateFrom
 * @property Carbon|null $DateTo
 * @property string|null $Reason
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property string|null $rowguid
 * @property Carbon|null $OutPatientOn
 * @property Carbon|null $InPatientFrom
 * @property Carbon|null $InPatientTo
 * @property int|null $CertificateTypeID
 *
 * @package App\Models
 */
class PatientMedicalCertificate extends Model
{
	protected $table = 'PatientMedicalCertificates';
	protected $primaryKey = 'PatientMedicalCertificateID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'DateFrom' => 'datetime',
		'DateTo' => 'datetime',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'OutPatientOn' => 'datetime',
		'InPatientFrom' => 'datetime',
		'InPatientTo' => 'datetime',
		'CertificateTypeID' => 'int'
	];

	protected $fillable = [
		'PatientID',
		'ProviderID',
		'DateFrom',
		'DateTo',
		'Reason',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'rowguid',
		'OutPatientOn',
		'InPatientFrom',
		'InPatientTo',
		'CertificateTypeID'
	];

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new \App\Scopes\DoctorScope);
		static::creating(function ($model) {
			if (empty($model->PatientMedicalCertificateID)) {
				$model->PatientMedicalCertificateID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientMedicalCertificateID'],
		);
    }
}
