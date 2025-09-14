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
 * Class TreatmentDoctorPayment
 * 
 * @property string $TreatmentPaymentId
 * @property string $TreatmentDoneId
 * @property string $ProviderId
 * @property float|null $Amount
 * @property string|null $rowguid
 * @property Carbon $AddedOn
 * @property string|null $AddedBy
 * @property Carbon $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property bool|null $IsDeleted
 * 
 * @property PatientTreatmentsDone $patient_treatments_done
 *
 * @package App\Models
 */
class TreatmentDoctorPayment extends Model
{
	protected $table = 'TreatmentDoctor_Payment';
	protected $primaryKey = 'TreatmentPaymentId';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Amount' => 'float',
		'AddedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'IsDeleted' => 'bool'
	];

	protected $fillable = [
		'TreatmentDoneId',
		'ProviderId',
		'Amount',
		'rowguid',
		'AddedOn',
		'AddedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'IsDeleted'
	];

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new \App\Scopes\DoctorScope);
		static::creating(function ($model) {
			if (empty($model->TreatmentPaymentId)) {
				$model->TreatmentPaymentId = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
	{
		return Attribute::make(
			get: fn (mixed $value, array $attributes) => $attributes['TreatmentPaymentId'],
		);
	}

	public function patient_treatments_done()
	{
		return $this->belongsTo(PatientTreatmentsDone::class, 'TreatmentDoneId');
	}
}
