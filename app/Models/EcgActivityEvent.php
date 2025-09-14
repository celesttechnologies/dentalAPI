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
 * Class EcgActivityEvent
 * 
 * @property string $EventActivityID
 * @property string|null $ClinicID
 * @property string|null $PatientID
 * @property int|null $EventTypeID
 * @property string|null $EventRelatedID
 * @property string|null $EventTypeName
 * @property string|null $EventDetails
 * @property string|null $DeviceTypeID
 * @property string|null $IpAddress
 * @property bool|null $Isdeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property int|null $EventRelatedFileId
 *
 * @package App\Models
 */
class EcgActivityEvent extends Model
{
	protected $table = 'Ecg_Activity_Events';
	protected $primaryKey = 'EventActivityID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'EventTypeID' => 'int',
		'Isdeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'EventRelatedFileId' => 'int'
	];

	protected $fillable = [
		'ClinicID',
		'PatientID',
		'EventTypeID',
		'EventRelatedID',
		'EventTypeName',
		'EventDetails',
		'DeviceTypeID',
		'IpAddress',
		'Isdeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'EventRelatedFileId'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->EventActivityID)) {
				$model->EventActivityID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['EventActivityID'],
		);
    }
}
