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
 * Class ClinicLabWorkDetail
 * 
 * @property string $LabWorkDetailID
 * @property string $LabWorkID
 * @property string|null $LabWorkComponentID
 * @property string|null $SelectedTeeth
 * @property float|null $LabWorkComponentCost
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $lastUpdatedBy
 * 
 * @property ClinicLabWork $clinic_lab_work
 * @property ClinicLabWorkComponent|null $clinic_lab_work_component
 *
 * @package App\Models
 */
class ClinicLabWorkDetail extends Model
{
	protected $table = 'ClinicLabWorkDetails';
	protected $primaryKey = 'LabWorkDetailID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'LabWorkComponentCost' => 'float',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'LabWorkID',
		'LabWorkComponentID',
		'SelectedTeeth',
		'LabWorkComponentCost',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'lastUpdatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->LabWorkDetailID)) {
				$model->LabWorkDetailID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['LabWorkDetailID'],
		);
    }

	public function clinic_lab_work()
	{
		return $this->belongsTo(ClinicLabWork::class, 'LabWorkID');
	}

	public function clinic_lab_work_component()
	{
		return $this->belongsTo(ClinicLabWorkComponent::class, 'LabWorkComponentID');
	}
}
