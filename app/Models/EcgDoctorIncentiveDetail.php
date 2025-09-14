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
 * Class EcgDoctorIncentiveDetail
 * 
 * @property string $IncetiveDetailId
 * @property string $IncetiveId
 * @property string $PatientTreatmentDoneID
 * @property float|null $TreatmentTotalCost
 * @property float|null $IncentiveAmount
 * @property int|null $IncentiveType
 * @property float|null $IncentiveValue
 * @property bool|null $IsDeleted
 * @property string|null $AddedBy
 * @property Carbon $AddedOn
 * @property string|null $LastUpdatedBy
 * @property Carbon $LastUpdatedOn
 *
 * @package App\Models
 */
class EcgDoctorIncentiveDetail extends Model
{
	protected $table = 'Ecg_DoctorIncentiveDetails';
	protected $primaryKey = 'IncetiveDetailId';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'TreatmentTotalCost' => 'float',
		'IncentiveAmount' => 'float',
		'IncentiveType' => 'int',
		'IncentiveValue' => 'float',
		'IsDeleted' => 'bool',
		'AddedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'IncetiveId',
		'PatientTreatmentDoneID',
		'TreatmentTotalCost',
		'IncentiveAmount',
		'IncentiveType',
		'IncentiveValue',
		'IsDeleted',
		'AddedBy',
		'AddedOn',
		'LastUpdatedBy',
		'LastUpdatedOn'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->IncetiveDetailId)) {
				$model->IncetiveDetailId = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['IncetiveDetailId'],
		);
    }
}
