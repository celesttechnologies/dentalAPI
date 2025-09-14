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
 * Class PatientAddress
 * 
 * @property string $PatientAddressID
 * @property string|null $PatientID
 * @property int|null $AddressTypeID
 * @property string|null $AddressLine1
 * @property string|null $AddressLine2
 * @property string|null $Street
 * @property string|null $Area
 * @property string|null $City
 * @property string|null $State
 * @property int|null $Country
 * @property string|null $ZipCode
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * 
 * @property Patient|null $patient
 *
 * @package App\Models
 */
class PatientAddress extends Model
{
	protected $table = 'Patient_Address';
	protected $primaryKey = 'PatientAddressID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'AddressTypeID' => 'int',
		'Country' => 'int',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'PatientID',
		'AddressTypeID',
		'AddressLine1',
		'AddressLine2',
		'Street',
		'Area',
		'City',
		'State',
		'Country',
		'ZipCode',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->PatientAddressID)) {
				$model->PatientAddressID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientAddressID'],
		);
    }

	public function patient()
	{
		return $this->belongsTo(Patient::class, 'PatientID');
	}
}
