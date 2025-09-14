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
 * Class PatientLab
 * 
 * @property string $PatientLabID
 * @property string $PatientID
 * @property string $ProviderID
 * @property Carbon $DateOfLabWork
 * @property Carbon|null $TimeOfLabWork
 * @property string|null $Work
 * @property int $Shade
 * @property bool|null $MT
 * @property string|null $Bisque
 * @property string|null $Finish
 * @property string|null $Denture
 * @property Carbon|null $DelDate
 * @property Carbon|null $DelTime
 * @property Carbon|null $RecDate
 * @property string|null $Remark
 * @property Carbon|null $RecTime
 * @property int $LabID
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property string $ReferenceNo
 * @property string|null $rowguid
 * 
 * @property Collection|PatientLabWork[] $patient_lab_works
 *
 * @package App\Models
 */
class PatientLab extends Model
{
	protected $table = 'PatientLab';
	protected $primaryKey = 'PatientLabID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'DateOfLabWork' => 'datetime',
		'TimeOfLabWork' => 'datetime',
		'Shade' => 'int',
		'MT' => 'bool',
		'DelDate' => 'datetime',
		'DelTime' => 'datetime',
		'RecDate' => 'datetime',
		'RecTime' => 'datetime',
		'LabID' => 'int',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'PatientID',
		'ProviderID',
		'DateOfLabWork',
		'TimeOfLabWork',
		'Work',
		'Shade',
		'MT',
		'Bisque',
		'Finish',
		'Denture',
		'DelDate',
		'DelTime',
		'RecDate',
		'Remark',
		'RecTime',
		'LabID',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'ReferenceNo',
		'rowguid'
	];

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new \App\Scopes\DoctorScope);
		static::creating(function ($model) {
			if (empty($model->PatientLabID)) {
				$model->PatientLabID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
	{
		return Attribute::make(
			get: fn (mixed $value, array $attributes) => $attributes['PatientLabID'],
		);
	}

	public function patient_lab_works()
	{
		return $this->hasMany(PatientLabWork::class, 'PatientLabID');
	}
}
