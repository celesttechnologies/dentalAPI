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
 * Class PatientInsuranceDetail
 * 
 * @property string $PatientInsuranceID
 * @property string $PatientID
 * @property bool|null $IsDentalInsurance
 * @property bool|null $IsOrthodonticInsurance
 * @property string|null $PrimaryInsurerName
 * @property string|null $PrimarySubscriberID
 * @property string|null $PrimaryGroupNo
 * @property string|null $SecondaryInsurerName
 * @property string|null $SecondarySubscriberID
 * @property string|null $SecondaryGroupNo
 * @property string|null $TertiaryInsurerName
 * @property string|null $TertiarySubscriberID
 * @property string|null $TertiaryGroupNo
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * 
 * @property Patient $patient
 *
 * @package App\Models
 */
class PatientInsuranceDetail extends Model
{
	protected $table = 'Patient_InsuranceDetail';
	protected $primaryKey = 'PatientInsuranceID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsDentalInsurance' => 'bool',
		'IsOrthodonticInsurance' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'PatientID',
		'IsDentalInsurance',
		'IsOrthodonticInsurance',
		'PrimaryInsurerName',
		'PrimarySubscriberID',
		'PrimaryGroupNo',
		'SecondaryInsurerName',
		'SecondarySubscriberID',
		'SecondaryGroupNo',
		'TertiaryInsurerName',
		'TertiarySubscriberID',
		'TertiaryGroupNo',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->PatientInsuranceID)) {
				$model->PatientInsuranceID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientInsuranceID'],
		);
    }

	public function patient()
	{
		return $this->belongsTo(Patient::class, 'PatientID');
	}
}
