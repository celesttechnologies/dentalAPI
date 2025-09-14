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
 * Class ClinicModulesAccess
 * 
 * @property string $ClinicModuleAccessID
 * @property string|null $ClinicID
 * @property string|null $LicenseModuleID
 * @property string|null $ModuleCode
 * @property bool|null $IsLicensed
 * @property string|null $LastUpdatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $rowguid
 * 
 * @property LicenseModule|null $license_module
 *
 * @package App\Models
 */
class ClinicModulesAccess extends Model
{
	protected $table = 'ClinicModulesAccess';
	protected $primaryKey = 'ClinicModuleAccessID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsLicensed' => 'bool',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'LicenseModuleID',
		'ModuleCode',
		'IsLicensed',
		'LastUpdatedBy',
		'LastUpdatedOn',
		'rowguid'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ClinicModuleAccessID)) {
				$model->ClinicModuleAccessID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ClinicModuleAccessID'],
		);
    }

	public function license_module()
	{
		return $this->belongsTo(LicenseModule::class, 'LicenseModuleID');
	}
}
