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
 * Class ECGClinicRoleConfiguration
 * 
 * @property string $ClinicRoleID
 * @property string $ClinicID
 * @property string $RoleID
 * @property string|null $LicenseModuleCodeCSV
 * @property bool|null $IsAdministratorRole
 * @property bool|null $IsActive
 * @property int|null $DefaultImportance
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 *
 * @package App\Models
 */
class ECGClinicRoleConfiguration extends Model
{
	protected $table = 'ECG_Clinic_RoleConfiguration';
	protected $primaryKey = 'ClinicRoleID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsAdministratorRole' => 'bool',
		'IsActive' => 'bool',
		'DefaultImportance' => 'int',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'RoleID',
		'LicenseModuleCodeCSV',
		'IsAdministratorRole',
		'IsActive',
		'DefaultImportance',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ClinicRoleID)) {
				$model->ClinicRoleID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ClinicRoleID'],
		);
    }
}
