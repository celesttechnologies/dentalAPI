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
 * Class EmailTransaction
 * 
 * @property string $EmailTransactionID
 * @property string|null $ClinicIID
 * @property string|null $PatientID
 * @property int|null $EmailTypeID
 * @property string|null $EmailTo
 * @property string|null $EmailFrom
 * @property string|null $EmailCC
 * @property string|null $EmailBcc
 * @property string|null $Subject
 * @property string|null $MessageText
 * @property string|null $EmailAttachmentsID
 * @property string|null $CreatedBy
 * @property Carbon|null $CreatedOn
 * @property int|null $Status
 * @property Carbon|null $SentOn
 * @property bool|null $IsDeleted
 * @property string|null $EmailFromName
 * @property string|null $EmailToName
 * @property Carbon|null $ScheduledOn
 *
 * @package App\Models
 */
class EmailTransaction extends Model
{
	protected $table = 'EmailTransaction';
	protected $primaryKey = 'EmailTransactionID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'EmailTypeID' => 'int',
		'CreatedOn' => 'datetime',
		'Status' => 'int',
		'SentOn' => 'datetime',
		'IsDeleted' => 'bool',
		'ScheduledOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicIID',
		'PatientID',
		'EmailTypeID',
		'EmailTo',
		'EmailFrom',
		'EmailCC',
		'EmailBcc',
		'Subject',
		'MessageText',
		'EmailAttachmentsID',
		'CreatedBy',
		'CreatedOn',
		'Status',
		'SentOn',
		'IsDeleted',
		'EmailFromName',
		'EmailToName',
		'ScheduledOn'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->EmailTransactionID)) {
				$model->EmailTransactionID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['EmailTransactionID'],
		);
    }
}
