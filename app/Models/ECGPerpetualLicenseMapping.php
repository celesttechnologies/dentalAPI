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
 * Class ECGPerpetualLicenseMapping
 * 
 * @property string $ClinicLicenseID
 * @property string|null $ClinicName
 * @property string|null $EmailAddress
 * @property string|null $MobileNumber
 * @property string|null $LicenseKey
 * @property string|null $FingerPrintCode
 * @property bool|null $IsActive
 * @property Carbon|null $LicenseValidTill
 * @property Carbon|null $LicenseLastSyncedOn
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 *
 * @package App\Models
 */
class ECGPerpetualLicenseMapping extends Model
{
	protected $table = 'ECG_PerpetualLicense_Mapping';
	protected $primaryKey = 'ClinicLicenseID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsActive' => 'bool',
		'LicenseValidTill' => 'datetime',
		'LicenseLastSyncedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicName',
		'EmailAddress',
		'MobileNumber',
		'LicenseKey',
		'FingerPrintCode',
		'IsActive',
		'LicenseValidTill',
		'LicenseLastSyncedOn',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ClinicLicenseID)) {
				$model->ClinicLicenseID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ClinicLicenseID'],
		);
    }
}
