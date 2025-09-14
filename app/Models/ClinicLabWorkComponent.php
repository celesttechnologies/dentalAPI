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
 * Class ClinicLabWorkComponent
 * 
 * @property string $LabWorkComponentID
 * @property string|null $ClinicID
 * @property string|null $ComponentName
 * @property string|null $ComponentDescription
 * @property float|null $LabWorkCost
 * @property string|null $ComponentCategoryID
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * 
 * @property Clinic|null $clinic
 * @property Collection|ClinicLabWorkDetail[] $clinic_lab_work_details
 *
 * @package App\Models
 */
class ClinicLabWorkComponent extends Model
{
	protected $table = 'ClinicLabWorkComponents';
	protected $primaryKey = 'LabWorkComponentID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'LabWorkCost' => 'float',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'ComponentName',
		'ComponentDescription',
		'LabWorkCost',
		'ComponentCategoryID',
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
			if (empty($model->LabWorkComponentID)) {
				$model->LabWorkComponentID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['LabWorkComponentID'],
		);
    }

	public function clinic()
	{
		return $this->belongsTo(Clinic::class, 'ClinicID');
	}

	public function clinic_lab_work_details()
	{
		return $this->hasMany(ClinicLabWorkDetail::class, 'LabWorkComponentID');
	}
}
