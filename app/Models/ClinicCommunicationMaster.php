<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class ClinicCommunicationMaster
 * 
 * @property string $ClinicCommunicationMasterID
 * @property int|null $CommunicationMasterTypeID
 * @property int|null $CommunicationMasterSubTypeID
 * @property string|null $CommunicationMasterSubTypeCode
 * @property string|null $Category
 * @property string|null $Description
 * @property int|null $CommunicationExecutionType
 * @property string|null $Attribute1
 * @property string|null $DefaultAttributeValue1
 * @property string|null $Attribute2
 * @property string|null $DefaultAttributeValue2
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * 
 * @property Collection|ClinicCommunicationConfig[] $clinic_communication_configs
 *
 * @package App\Models
 */
class ClinicCommunicationMaster extends Model
{
	protected $table = 'ClinicCommunicationMaster';
	protected $primaryKey = 'ClinicCommunicationMasterID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'CommunicationMasterTypeID' => 'int',
		'CommunicationMasterSubTypeID' => 'int',
		'CommunicationExecutionType' => 'int',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ClinicCommunicationMasterID)) {
				$model->ClinicCommunicationMasterID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ClinicCommunicationMasterID'],
		);
    }

	protected $fillable = [
		'CommunicationMasterTypeID',
		'CommunicationMasterSubTypeID',
		'CommunicationMasterSubTypeCode',
		'Category',
		'Description',
		'CommunicationExecutionType',
		'Attribute1',
		'DefaultAttributeValue1',
		'Attribute2',
		'DefaultAttributeValue2',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	public function clinic_communication_configs()
	{
		return $this->hasMany(ClinicCommunicationConfig::class, 'ClinicCommunicationMasterID');
	}
}
