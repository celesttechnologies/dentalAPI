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
 * Class Appointment
 * 
 * @property string $AppointmentID
 * @property string|null $ClinicID
 * @property string|null $PatientID
 * @property string $ProviderID
 * @property Carbon|null $StartDateTime
 * @property Carbon|null $EndDateTime
 * @property string|null $Comments
 * @property string|null $Status
 * @property Carbon|null $ReminderDate
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property Carbon|null $CancelledOn
 * @property string|null $CancelledBy
 * @property string|null $CancellationReason
 * @property string|null $CancellationType
 * @property bool|null $IsDeleted
 * @property string|null $PatientName
 * @property string|null $PatientPhone
 * @property string|null $ArrivalTime
 * @property string|null $CompleteTime
 * @property string|null $OperationTime
 * @property string|null $WaitTime
 * @property string|null $ChairID
 * @property string|null $rowguid
 * @property string|null $PatientTitle
 * @property string|null $PatientFirstName
 * @property string|null $PatientLastName
 * @property string|null $PatientGender
 * @property int|null $PatientAge
 * @property string|null $PatientNationality
 * @property bool|null $IsAllDay
 *
 * @package App\Models
 */
class Appointment extends Model
{
	protected $table = 'Appointments';
	protected $primaryKey = 'AppointmentID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'StartDateTime' => 'datetime',
		'EndDateTime' => 'datetime',
		'ReminderDate' => 'datetime',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'CancelledOn' => 'datetime',
		'IsDeleted' => 'bool',
		'PatientAge' => 'int',
		'IsAllDay' => 'bool'
	];

	protected $fillable = [
		'ClinicID',
		'PatientID',
		'ProviderID',
		'StartDateTime',
		'EndDateTime',
		'Comments',
		'Status',
		'ReminderDate',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'CancelledOn',
		'CancelledBy',
		'CancellationReason',
		'CancellationType',
		'IsDeleted',
		'PatientName',
		'PatientPhone',
		'ArrivalTime',
		'CompleteTime',
		'OperationTime',
		'WaitTime',
		'ChairID',
		'rowguid',
		'PatientTitle',
		'PatientFirstName',
		'PatientLastName',
		'PatientGender',
		'PatientAge',
		'PatientNationality',
		'IsAllDay',
		'MovedToWaitingArea'
	];
	
	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new \App\Scopes\DoctorScope);
		static::creating(function ($model) {
			if (empty($model->AppointmentID)) {
				$model->AppointmentID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
		static::saved(function ($appointment) {
			if ($appointment->patient) {
				$appointment->patient->indexToElasticsearch();
			}
		});
		static::deleted(function ($appointment) {
			if ($appointment->patient) {
				$appointment->patient->indexToElasticsearch();
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['AppointmentID'],
		);
    }

	public function provider()
	{
		return $this->belongsTo(Provider::class, 'ProviderID', 'ProviderID');
	}


	public function patient()
	{
		return $this->belongsTo(Patient::class);
	}
}
