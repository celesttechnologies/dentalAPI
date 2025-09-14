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
 * Class LicenseModule
 * 
 * @property string $LicenseModuleID
 * @property string|null $ModuleCode
 * @property string|null $ModuleName
 * @property string|null $ModuleDescription
 * @property int|null $OrderNumber
 * @property string|null $PreRequisitesCSV
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * 
 * @property Collection|ClinicModulesAccess[] $clinic_modules_accesses
 *
 * @package App\Models
 */
class LicenseModule extends Model
{
	protected $table = 'LicenseModules';
	protected $primaryKey = 'LicenseModuleID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'OrderNumber' => 'int',
		'CreatedOn' => 'datetime'
	];

	protected $fillable = [
		'ModuleCode',
		'ModuleName',
		'ModuleDescription',
		'OrderNumber',
		'PreRequisitesCSV',
		'CreatedOn',
		'CreatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->LicenseModuleID)) {
				$model->LicenseModuleID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['LicenseModuleID'],
		);
    }

	public function clinic_modules_accesses()
	{
		return $this->hasMany(ClinicModulesAccess::class, 'LicenseModuleID');
	}
}
