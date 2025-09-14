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
 * Class Provider
 * 
 * @property string $ProviderID
 * @property string|null $ClinicID
 * @property string|null $ProviderName
 * @property string|null $Location
 * @property string|null $Email
 * @property string|null $Experience
 * @property bool|null $IsDeleted
 * @property string|null $LastUpdatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $ProviderImage
 * @property string|null $PhoneNumber
 * @property string|null $rowguid
 * @property int|null $Sequence
 * @property string|null $Attribute1
 * @property string|null $Attribute2
 * @property string|null $Attribute3
 * @property string|null $Category
 * @property string|null $RegistrationNumber
 * @property bool|null $DisplayInAppointmentsView
 * @property string|null $UserID
 * @property int|null $IncentiveType
 * @property float|null $IncentiveValue
 * @property string|null $ColorCode
 *
 * @package App\Models
 */
class Provider extends Model
{
	protected $table = 'Provider';
	protected $primaryKey = 'ProviderID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsDeleted' => 'bool',
		'LastUpdatedOn' => 'datetime',
		'Sequence' => 'int',
		'DisplayInAppointmentsView' => 'bool',
		'IncentiveType' => 'int',
		'IncentiveValue' => 'float'
	];

	protected $fillable = [
		'ClinicID',
		'ProviderName',
		'Location',
		'Email',
		'Experience',
		'IsDeleted',
		'LastUpdatedBy',
		'LastUpdatedOn',
		'ProviderImage',
		'PhoneNumber',
		'rowguid',
		'Sequence',
		'Attribute1',
		'Attribute2',
		'Attribute3',
		'Category',
		'RegistrationNumber',
		'DisplayInAppointmentsView',
		'UserID',
		'IncentiveType',
		'IncentiveValue',
		'ColorCode'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ProviderID)) {
				$model->ProviderID = (string) Str::uuid(); // Auto-generate UUID
			}

			$model->ClinicID = auth()->user()->ClinicID;
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ProviderID'],
		);
    }

	public function patientTreatments()
    {
        return $this->hasMany(PatientTreatment::class, 'ProviderID', 'id');
    }
}
