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
 * Class PatientTreatmentsDone
 * 
 * @property string $PatientTreatmentDoneID
 * @property string $PatientID
 * @property string $ProviderID
 * @property float|null $TreatmentCost
 * @property float|null $TreatmentDiscount
 * @property float|null $TreatmentTax
 * @property float|null $TreatmentTotalCost
 * @property float|null $TreatmentPayment
 * @property float|null $TreatmentBalance
 * @property string|null $ModeofPayment
 * @property string|null $ChequeNo
 * @property Carbon|null $ChequeDate
 * @property string|null $BankName
 * @property int|null $CreditCardBankID
 * @property string|null $CreditCardDigit
 * @property string|null $CreditCardOwner
 * @property string|null $CreditCardValidFrom
 * @property string|null $CreditCardValidTo
 * @property Carbon|null $TreatmentDate
 * @property string|null $ProviderInchargeID
 * @property bool|null $IsDeleted
 * @property string|null $AddedBy
 * @property Carbon $AddedOn
 * @property string|null $LastUpdatedBy
 * @property Carbon $LastUpdatedOn
 * @property string|null $rowguid
 * @property Carbon|null $ReceiptDate
 * @property int|null $ReceiptNo
 * @property bool|null $IsArchived
 * @property string|null $ParentPatientTreatmentDoneID
 * @property float|null $TreatmentAddition
 * @property string|null $WaitingAreaID
 * @property float|null $AmountToBeCollected
 * @property string|null $TeethTreatmentNote
 * @property Carbon|null $ArchivedOn
 * 
 * @property Patient $patient
 * @property Collection|PatientReceipt[] $patient_receipts
 * @property Collection|TreatmentDoctorPayment[] $treatment_doctor_payments
 *
 * @package App\Models
 */
class PatientTreatmentsDone extends Model
{
	protected $table = 'PatientTreatmentsDone';
	protected $primaryKey = 'PatientTreatmentDoneID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'TreatmentCost' => 'float',
		'TreatmentDiscount' => 'float',
		'TreatmentTax' => 'float',
		'TreatmentTotalCost' => 'float',
		'TreatmentPayment' => 'float',
		'TreatmentBalance' => 'float',
		'ChequeDate' => 'datetime',
		'CreditCardBankID' => 'int',
		'TreatmentDate' => 'datetime',
		'IsDeleted' => 'bool',
		'AddedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'ReceiptDate' => 'datetime',
		'ReceiptNo' => 'int',
		'IsArchived' => 'bool',
		'TreatmentAddition' => 'float',
		'AmountToBeCollected' => 'float',
		'ArchivedOn' => 'datetime'
	];

	protected $fillable = [
		'PatientID',
		'ProviderID',
		'TreatmentCost',
		'TreatmentDiscount',
		'TreatmentTax',
		'TreatmentTotalCost',
		'TreatmentPayment',
		'TreatmentBalance',
		'ModeofPayment',
		'ChequeNo',
		'ChequeDate',
		'BankName',
		'CreditCardBankID',
		'CreditCardDigit',
		'CreditCardOwner',
		'CreditCardValidFrom',
		'CreditCardValidTo',
		'TreatmentDate',
		'ProviderInchargeID',
		'IsDeleted',
		'AddedBy',
		'AddedOn',
		'LastUpdatedBy',
		'LastUpdatedOn',
		'rowguid',
		'ReceiptDate',
		'ReceiptNo',
		'IsArchived',
		'ParentPatientTreatmentDoneID',
		'TreatmentAddition',
		'WaitingAreaID',
		'AmountToBeCollected',
		'TeethTreatmentNote',
		'ArchivedOn',
		'isPrimaryTooth',
		'IsCompleted',
		'CompletionTime',
	];

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new \App\Scopes\DoctorScope);
		static::creating(function ($model) {
			if (empty($model->PatientTreatmentDoneID)) {
				$model->PatientTreatmentDoneID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientTreatmentDoneID'],
		);
    }

	public function patient()
	{
		return $this->belongsTo(Patient::class, 'PatientID');
	}

	public function waiting_area()
	{
		return $this->belongsTo(WaitingAreaPatient::class, 'WaitingAreaID');
	}

	public function patient_receipts()
	{
		return $this->hasMany(PatientReceipt::class, 'PatientTreatmentDoneId');
	}

	public function treatment_doctor_payments()
	{
		return $this->hasMany(TreatmentDoctorPayment::class, 'TreatmentDoneId');
	}

	public function treatment_type()
	{
		return $this->hasOne(PatientTreatmentTypeDone::class, 'PatientTreatmentDoneId');
	}

	public function doctor()
	{
		return $this->belongsTo(Provider::class, 'ProviderID');
	}
}
