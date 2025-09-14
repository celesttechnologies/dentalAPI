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
 * Class ECGMSubscriptionModel
 * 
 * @property string $SubscriptionModelID
 * @property string|null $SubscriptionModelName
 * @property int|null $SubscriptionPackageID
 * @property int|null $SubscriptionTypeID
 * @property int|null $OrderNumber
 * @property int|null $UsersLimit
 * @property int|null $ProvidersLimit
 * @property int|null $PatientsLimit
 * @property int|null $AppointmentsLimit
 * @property int|null $WAVisitsLimit
 * @property int|null $DocumentSpaceLimit
 * @property string|null $LicenseModuleCodeCSV
 * @property bool|null $IsActive
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 *
 * @package App\Models
 */
class ECGMSubscriptionModel extends Model
{
	protected $table = 'ECG_M_SubscriptionModels';
	protected $primaryKey = 'SubscriptionModelID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'SubscriptionPackageID' => 'int',
		'SubscriptionTypeID' => 'int',
		'OrderNumber' => 'int',
		'UsersLimit' => 'int',
		'ProvidersLimit' => 'int',
		'PatientsLimit' => 'int',
		'AppointmentsLimit' => 'int',
		'WAVisitsLimit' => 'int',
		'DocumentSpaceLimit' => 'int',
		'IsActive' => 'bool',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'SubscriptionModelName',
		'SubscriptionPackageID',
		'SubscriptionTypeID',
		'OrderNumber',
		'UsersLimit',
		'ProvidersLimit',
		'PatientsLimit',
		'AppointmentsLimit',
		'WAVisitsLimit',
		'DocumentSpaceLimit',
		'LicenseModuleCodeCSV',
		'IsActive',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->SubscriptionModelID)) {
				$model->SubscriptionModelID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['SubscriptionModelID'],
		);
    }
}
