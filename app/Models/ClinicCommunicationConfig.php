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
 * Class ClinicCommunicationConfig
 * 
 * @property string $ClinicCommunicationConfigID
 * @property string $ClinicID
 * @property string $ClinicCommunicationMasterID
 * @property string|null $AttributeValue1
 * @property string|null $AttributeValue2
 * @property bool|null $IsActive
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * 
 * @property Clinic $clinic
 * @property ClinicCommunicationMaster $clinic_communication_master
 *
 * @package App\Models
 */
class ClinicCommunicationConfig extends Model
{
	protected $table = 'ClinicCommunicationConfig';
	protected $primaryKey = 'ClinicCommunicationConfigID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsActive' => 'bool',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'ClinicCommunicationMasterID',
		'AttributeValue1',
		'AttributeValue2',
		'IsActive',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ClinicCommunicationConfigID)) {
				$model->ClinicCommunicationConfigID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ClinicCommunicationConfigID'],
		);
    }

	public function clinic()
	{
		return $this->belongsTo(Clinic::class, 'ClinicID');
	}

	public function clinic_communication_master()
	{
		return $this->belongsTo(ClinicCommunicationMaster::class, 'ClinicCommunicationMasterID');
	}
}
