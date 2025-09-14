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
 * Class ECGPerpetualLicenseMaster
 * 
 * @property int $ECGLicenseID
 * @property string|null $LicenseKey
 * @property int|null $LicenseTypeID
 * @property Carbon|null $LicenseCreatedDate
 * @property Carbon|null $LicenseActivatedOn
 * @property int|null $LicenseValidityTypeID
 * @property Carbon|null $LicenseDeactivatedOn
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 *
 * @package App\Models
 */
class ECGPerpetualLicenseMaster extends Model
{
	protected $table = 'ECG_PerpetualLicense_Master';
	protected $primaryKey = 'ECGLicenseID';
	public $timestamps = false;

	protected $casts = [
		'LicenseTypeID' => 'int',
		'LicenseCreatedDate' => 'datetime',
		'LicenseActivatedOn' => 'datetime',
		'LicenseValidityTypeID' => 'int',
		'LicenseDeactivatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'LicenseKey',
		'LicenseTypeID',
		'LicenseCreatedDate',
		'LicenseActivatedOn',
		'LicenseValidityTypeID',
		'LicenseDeactivatedOn',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ECGLicenseID'],
		);
    }
}
