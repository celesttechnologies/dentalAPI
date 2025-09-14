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
 * Class SMSTransaction
 * 
 * @property string $SMSTransactionID
 * @property string|null $ClinicID
 * @property string|null $ReferenceCode
 * @property string|null $PatientID
 * @property int|null $SMSTypeID
 * @property string|null $MobileNumber
 * @property string|null $MessageText
 * @property Carbon|null $ScheduledOn
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property bool|null $SentStatus
 * @property Carbon|null $SentOn
 * @property string|null $SentStatusMessage
 * @property bool|null $IsPromotional
 *
 * @package App\Models
 */
class SMSTransaction extends Model
{
	protected $table = 'SMSTransactions';
	protected $primaryKey = 'SMSTransactionID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'SMSTypeID' => 'int',
		'ScheduledOn' => 'datetime',
		'CreatedOn' => 'datetime',
		'SentStatus' => 'bool',
		'SentOn' => 'datetime',
		'IsPromotional' => 'bool'
	];

	protected $fillable = [
		'ClinicID',
		'ReferenceCode',
		'PatientID',
		'SMSTypeID',
		'MobileNumber',
		'MessageText',
		'ScheduledOn',
		'CreatedOn',
		'CreatedBy',
		'SentStatus',
		'SentOn',
		'SentStatusMessage',
		'IsPromotional'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->SMSTransactionID)) {
				$model->SMSTransactionID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['SMSTransactionID'],
		);
    }
}
