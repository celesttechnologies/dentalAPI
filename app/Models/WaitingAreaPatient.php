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
 * Class WaitingAreaPatient
 * 
 * @property string $WaitingAreaID
 * @property string|null $ClinicID
 * @property string|null $AppointmentID
 * @property string|null $PatientID
 * @property string|null $PatientName
 * @property string|null $PatientPhone
 * @property string|null $ProviderID
 * @property string|null $ProviderName
 * @property Carbon|null $StartDateTime
 * @property Carbon|null $EndDateTime
 * @property string|null $Comments
 * @property string|null $Status
 * @property Carbon|null $ReminderDate
 * @property Carbon|null $CancelledOn
 * @property string|null $CancelledBy
 * @property string|null $CancellationReason
 * @property string|null $CancellationType
 * @property Carbon|null $ArrivalTime
 * @property Carbon|null $OperationTime
 * @property Carbon|null $CompleteTime
 * @property bool|null $IsDeleted
 * @property string|null $WaitTime
 * @property string|null $ChairID
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property string|null $rowguid
 * @property string|null $TokenNumber
 * @property bool|null $IsQueueNotificationSMSRequested
 * @property int|null $QueueNotificationCount
 *
 * @package App\Models
 */
class WaitingAreaPatient extends Model
{
	protected $table = 'WaitingAreaPatients';
	protected $primaryKey = 'WaitingAreaID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'StartDateTime' => 'datetime',
		'EndDateTime' => 'datetime',
		'ReminderDate' => 'datetime',
		'CancelledOn' => 'datetime',
		'ArrivalTime' => 'datetime',
		'OperationTime' => 'datetime',
		'CompleteTime' => 'datetime',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'IsQueueNotificationSMSRequested' => 'bool',
		'QueueNotificationCount' => 'int'
	];

	protected $fillable = [
		'ClinicID',
		'AppointmentID',
		'PatientID',
		'PatientName',
		'PatientPhone',
		'ProviderID',
		'ProviderName',
		'StartDateTime',
		'EndDateTime',
		'Comments',
		'Status',
		'ReminderDate',
		'CancelledOn',
		'CancelledBy',
		'CancellationReason',
		'CancellationType',
		'ArrivalTime',
		'OperationTime',
		'CompleteTime',
		'IsDeleted',
		'WaitTime',
		'ChairID',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'rowguid',
		'TokenNumber',
		'IsQueueNotificationSMSRequested',
		'QueueNotificationCount',
		'MovedToTreatmentArea',
	];

protected static function boot()
{
	parent::boot();
	static::addGlobalScope(new \App\Scopes\DoctorScope);
	static::creating(function ($model) {
		if (empty($model->WaitingAreaID)) {
			$model->WaitingAreaID = (string) Str::uuid(); // Auto-generate UUID
		}
	});
}

	protected function id(): Attribute
	{
		return Attribute::make(
			get: fn (mixed $value, array $attributes) => $attributes['WaitingAreaID'],
		);
	}

	protected function provider()
	{
		return $this->belongsTo(Provider::class, 'ProviderID', 'ProviderID');
	}

	protected function patient()
	{
		return $this->belongsTo(Patient::class, 'PatientID', 'PatientID');
	}
}
