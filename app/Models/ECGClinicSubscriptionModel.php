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
 * Class ECGClinicSubscriptionModel
 * 
 * @property string $ClinicSubscriptionDetailID
 * @property string|null $ClinicID
 * @property int|null $SubscriptionPackageID
 * @property Carbon|null $StartDate
 * @property Carbon|null $EndDate
 * @property bool|null $IsCurrentSubscription
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 *
 * @package App\Models
 */
class ECGClinicSubscriptionModel extends Model
{
	protected $table = 'ECG_Clinic_SubscriptionModels';
	protected $primaryKey = 'ClinicSubscriptionDetailID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'SubscriptionPackageID' => 'int',
		'StartDate' => 'datetime',
		'EndDate' => 'datetime',
		'IsCurrentSubscription' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'SubscriptionPackageID',
		'StartDate',
		'EndDate',
		'IsCurrentSubscription',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ClinicSubscriptionDetailID)) {
				$model->ClinicSubscriptionDetailID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ClinicSubscriptionDetailID'],
		);
    }
}
