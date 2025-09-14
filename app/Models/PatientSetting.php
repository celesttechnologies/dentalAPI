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
 * Class PatientSetting
 * 
 * @property string $PatientSettingID
 * @property string $PatientTreatmentID
 * @property string $Setting
 * @property Carbon $SettingDate
 * @property string $ProviderID
 * @property string|null $ProviderInchargeID
 * @property int|null $WorkDone
 * @property bool|null $ReqLabWork
 * @property string|null $SettingNote
 * @property float $EstimatedCost
 * @property string|null $ModeOfPayment
 * @property float|null $AmountPaid
 * @property float|null $BalanceAmount
 * @property float|null $AvailableBalance
 * @property string|null $ChequeNo
 * @property Carbon|null $ChequeDate
 * @property string|null $BankName
 * @property int|null $CreditCardBankID
 * @property string|null $CreditCardDigit
 * @property string|null $CreditCardOwner
 * @property string|null $CreditCardValidFrom
 * @property string|null $CreditCardValidTo
 * @property bool|null $IsDeleted
 * @property Carbon|null $AddedOn
 * @property string|null $AddedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property int $SettingID
 * @property int|null $ID
 * @property string|null $rowguid
 * 
 * @property PatientTreatment $patient_treatment
 *
 * @package App\Models
 */
class PatientSetting extends Model
{
	protected $table = 'PatientSetting';
	protected $primaryKey = 'PatientSettingID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'SettingDate' => 'datetime',
		'WorkDone' => 'int',
		'ReqLabWork' => 'bool',
		'EstimatedCost' => 'float',
		'AmountPaid' => 'float',
		'BalanceAmount' => 'float',
		'AvailableBalance' => 'float',
		'ChequeDate' => 'datetime',
		'CreditCardBankID' => 'int',
		'IsDeleted' => 'bool',
		'AddedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'SettingID' => 'int',
		'ID' => 'int'
	];

	protected $fillable = [
		'PatientTreatmentID',
		'Setting',
		'SettingDate',
		'ProviderID',
		'ProviderInchargeID',
		'WorkDone',
		'ReqLabWork',
		'SettingNote',
		'EstimatedCost',
		'ModeOfPayment',
		'AmountPaid',
		'BalanceAmount',
		'AvailableBalance',
		'ChequeNo',
		'ChequeDate',
		'BankName',
		'CreditCardBankID',
		'CreditCardDigit',
		'CreditCardOwner',
		'CreditCardValidFrom',
		'CreditCardValidTo',
		'IsDeleted',
		'AddedOn',
		'AddedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'SettingID',
		'ID',
		'rowguid'
	];

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new \App\Scopes\DoctorScope);
		static::creating(function ($model) {
			if (empty($model->PatientSettingID)) {
				$model->PatientSettingID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
	{
		return Attribute::make(
			get: fn (mixed $value, array $attributes) => $attributes['PatientSettingID'],
		);
	}

	public function patient_treatment()
	{
		return $this->belongsTo(PatientTreatment::class, 'PatientTreatmentID');
	}
}
