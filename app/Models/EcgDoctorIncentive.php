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
 * Class EcgDoctorIncentive
 * 
 * @property string $IncetiveId
 * @property string|null $ClinicId
 * @property string|null $ProviderId
 * @property string|null $Month
 * @property int|null $Year
 * @property float|null $TotalIncentiveAmount
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 *
 * @package App\Models
 */
class EcgDoctorIncentive extends Model
{
	protected $table = 'Ecg_DoctorIncentive';
	protected $primaryKey = 'IncetiveId';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Year' => 'int',
		'TotalIncentiveAmount' => 'float',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicId',
		'ProviderId',
		'Month',
		'Year',
		'TotalIncentiveAmount',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new \App\Scopes\DoctorScope);
		static::creating(function ($model) {
			if (empty($model->IncetiveId)) {
				$model->IncetiveId = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['IncetiveId'],
		);
    }
}
