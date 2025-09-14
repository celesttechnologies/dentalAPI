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
 * Class CommunicationGroupMaster
 * 
 * @property string $CommunicationGroupMasterGuid
 * @property string|null $GroupName
 * @property string|null $ClinicID
 * @property int|null $GroupType
 * @property string|null $GroupDescription
 * @property bool|null $IsDeleted
 * @property string|null $CreatedBy
 * @property Carbon|null $CreatedOn
 * @property string|null $LastUpdatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property bool|null $IsPatientGroup
 * @property bool|null $IsOtherGroup
 *
 * @package App\Models
 */
class CommunicationGroupMaster extends Model
{
	protected $table = 'CommunicationGroupMaster';
	protected $primaryKey = 'CommunicationGroupMasterGuid';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'GroupType' => 'int',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'IsPatientGroup' => 'bool',
		'IsOtherGroup' => 'bool'
	];

	protected $fillable = [
		'GroupName',
		'ClinicID',
		'GroupType',
		'GroupDescription',
		'IsDeleted',
		'CreatedBy',
		'CreatedOn',
		'LastUpdatedBy',
		'LastUpdatedOn',
		'IsPatientGroup',
		'IsOtherGroup'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->CommunicationGroupMasterGuid)) {
				$model->CommunicationGroupMasterGuid = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['CommunicationGroupMasterGuid'],
		);
    }
}
