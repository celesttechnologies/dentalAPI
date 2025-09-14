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
 * Class WhatsappSMSTransaction
 * 
 * @property string $WhatsappSMSTransactionID
 * @property string|null $ClinicID
 * @property string|null $PatientID
 * @property string|null $MobileNumber
 * @property string|null $MessageText
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property bool|null $SentStatus
 * @property Carbon|null $SentOn
 * @property string|null $SentStatusMessage
 * @property string|null $SMSSituation
 *
 * @package App\Models
 */
class WhatsappSMSTransaction extends Model
{
	protected $table = 'WhatsappSMSTransactions';
	protected $primaryKey = 'WhatsappSMSTransactionID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'CreatedOn' => 'datetime',
		'SentStatus' => 'bool',
		'SentOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'PatientID',
		'MobileNumber',
		'MessageText',
		'CreatedOn',
		'CreatedBy',
		'SentStatus',
		'SentOn',
		'SentStatusMessage',
		'SMSSituation'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->WhatsappSMSTransactionID)) {
				$model->WhatsappSMSTransactionID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['WhatsappSMSTransactionID'],
		);
    }
}
