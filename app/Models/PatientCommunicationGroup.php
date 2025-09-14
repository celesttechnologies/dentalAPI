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
 * Class PatientCommunicationGroup
 * 
 * @property string $CommunicationGroupID
 * @property string $CommunicationGroupMasterGuid
 * @property string|null $PatientID
 * @property string|null $ClinicID
 * @property int|null $GroupType
 * @property string|null $GroupName
 * @property string|null $GroupDescription
 * @property bool|null $IsDeleted
 * @property string|null $CreatedBy
 * @property Carbon|null $CreatedOn
 * @property string|null $LastUpdatedBy
 * @property Carbon|null $LastUpdatedOn
 *
 * @package App\Models
 */
class PatientCommunicationGroup extends Model
{
	protected $table = 'PatientCommunicationGroup';
	protected $primaryKey = 'CommunicationGroupID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'GroupType' => 'int',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'CommunicationGroupMasterGuid',
		'PatientID',
		'ClinicID',
		'GroupType',
		'GroupName',
		'GroupDescription',
		'IsDeleted',
		'CreatedBy',
		'CreatedOn',
		'LastUpdatedBy',
		'LastUpdatedOn'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->CommunicationGroupID)) {
				$model->CommunicationGroupID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['CommunicationGroupID'],
		);
    }
}
