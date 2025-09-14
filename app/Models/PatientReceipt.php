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
 * Class PatientReceipt
 * 
 * @property string $ReceiptID
 * @property string|null $ClinicID
 * @property int $ReceiptNo
 * @property string $ReceiptNumber
 * @property int|null $ManualReceiptNo
 * @property string|null $ReceiptCodePrefix
 * @property string|null $InvoiceID
 * @property Carbon|null $ReceiptDate
 * @property string|null $PatientID
 * @property string|null $PatientTreatmentDoneId
 * @property float|null $TreatmentPayment
 * @property float|null $InvoicedAmount
 * @property float|null $BalanceAmount
 * @property string|null $ModeofPayment
 * @property string|null $ChequeNo
 * @property Carbon|null $ChequeDate
 * @property string|null $BankName
 * @property int|null $CreditCardBankID
 * @property string|null $CreditCardDigit
 * @property string|null $CreditCardOwner
 * @property string|null $CreditCardValidFrom
 * @property string|null $CreditCardValidTo
 * @property string|null $PaymentNotes
 * @property bool|null $IsCancelled
 * @property string|null $CancellationNotes
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property string|null $rowguid
 * @property string|null $WaitingAreaID
 * @property string|null $InsuranceName
 * @property string|null $PolicyNumber
 * @property string|null $PolicyNotes
 * @property string|null $ReceiptNotes
 * 
 * @property Patient|null $patient
 * @property PatientTreatmentsDone|null $patient_treatments_done
 *
 * @package App\Models
 */
class PatientReceipt extends Model
{
	protected $table = 'PatientReceipts';
	protected $primaryKey = 'ReceiptID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ReceiptNo' => 'int',
		'ManualReceiptNo' => 'int',
		'ReceiptDate' => 'datetime',
		'TreatmentPayment' => 'float',
		'InvoicedAmount' => 'float',
		'BalanceAmount' => 'float',
		'ChequeDate' => 'datetime',
		'CreditCardBankID' => 'int',
		'IsCancelled' => 'bool',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'ReceiptNo',
		'ReceiptNumber',
		'ManualReceiptNo',
		'ReceiptCodePrefix',
		'InvoiceID',
		'ReceiptDate',
		'PatientID',
		'PatientTreatmentDoneId',
		'TreatmentPayment',
		'InvoicedAmount',
		'BalanceAmount',
		'ModeofPayment',
		'ChequeNo',
		'ChequeDate',
		'BankName',
		'CreditCardBankID',
		'CreditCardDigit',
		'CreditCardOwner',
		'CreditCardValidFrom',
		'CreditCardValidTo',
		'PaymentNotes',
		'IsCancelled',
		'CancellationNotes',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'rowguid',
		'WaitingAreaID',
		'InsuranceName',
		'PolicyNumber',
		'PolicyNotes',
		'ReceiptNotes'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ReceiptID)) {
				$model->ReceiptID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ReceiptID'],
		);
    }

	public function patient()
	{
		return $this->belongsTo(Patient::class, 'PatientID');
	}

	public function patient_treatments_done()
	{
		return $this->belongsTo(PatientTreatmentsDone::class, 'PatientTreatmentDoneId');
	}

	public function receiptDetails()
	{
		return $this->hasMany(PatientReceiptsDetail::class, 'ReceiptID', 'ReceiptID');
	}
}
