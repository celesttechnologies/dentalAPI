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
 * Class PersonalReminder
 * 
 * @property string $ReminderId
 * @property string|null $ClinicID
 * @property string|null $PatientID
 * @property string|null $UserID
 * @property string|null $ProviderID
 * @property int|null $ReminderTypeID
 * @property Carbon $ReminderDate
 * @property string $ReminderSubject
 * @property string $ReminderDescription
 * @property bool $IsDeleted
 * @property string $CreatedBy
 * @property Carbon $CreatedOn
 * @property string $LastUpdatedBy
 * @property Carbon $LastUpdatedOn
 * @property string $rowguid
 * @property int|null $StatusId
 *
 * @package App\Models
 */
class PersonalReminder extends Model
{
	protected $table = 'PersonalReminder';
	protected $primaryKey = 'ReminderId';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ReminderTypeID' => 'int',
		'ReminderDate' => 'datetime',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'StatusId' => 'int'
	];

	protected $fillable = [
		'ClinicID',
		'PatientID',
		'UserID',
		'ProviderID',
		'ReminderTypeID',
		'ReminderDate',
		'ReminderSubject',
		'ReminderDescription',
		'IsDeleted',
		'CreatedBy',
		'CreatedOn',
		'LastUpdatedBy',
		'LastUpdatedOn',
		'rowguid',
		'StatusId'
	];

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new \App\Scopes\DoctorScope);
		static::creating(function ($model) {
			if (empty($model->ReminderId)) {
				$model->ReminderId = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ReminderId'],
		);
    }

	public function patient()
	{
		return $this->belongsTo(Patient::class, 'PatientID');
	}

	public function doctor()
	{
		return $this->belongsTo(Provider::class, 'ProviderID');
	}

	public function notes()
	{
		return $this->hasMany(PersonalReminderNote::class, 'ReminderID');
	}
}
