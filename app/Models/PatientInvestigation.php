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
 * Class PatientInvestigation
 * 
 * @property string $PatientInvestigationID
 * @property string|null $PatientID
 * @property Carbon|null $DateOfInvestigation
 * @property string|null $Weight
 * @property string|null $BloodPressure
 * @property string|null $FBS
 * @property string|null $PLBS
 * @property string|null $HbAC
 * @property string|null $LDL
 * @property string|null $ACR
 * @property string|null $Retina
 * @property string|null $Urine
 * @property string|null $Others
 * @property string|null $Custom1
 * @property string|null $Custom2
 * @property string|null $Custom3
 * @property string|null $Custom4
 * @property string|null $Custom5
 * @property string|null $Custom6
 * @property string|null $Custom7
 * @property string|null $Custom8
 * @property bool|null $IsDeleted
 * @property string|null $CreatedBy
 * @property Carbon|null $CreatedOn
 * @property string|null $LastUpdatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $rowguid
 * 
 * @property Patient|null $patient
 *
 * @package App\Models
 */
class PatientInvestigation extends Model
{
	protected $table = 'PatientInvestigations';
	protected $primaryKey = 'PatientInvestigationID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'DateOfInvestigation' => 'datetime',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'PatientID',
		'DateOfInvestigation',
		'Weight',
		'BloodPressure',
		'FBS',
		'PLBS',
		'HbAC',
		'LDL',
		'ACR',
		'Retina',
		'Urine',
		'Others',
		'Custom1',
		'Custom2',
		'Custom3',
		'Custom4',
		'Custom5',
		'Custom6',
		'Custom7',
		'Custom8',
		'IsDeleted',
		'CreatedBy',
		'CreatedOn',
		'LastUpdatedBy',
		'LastUpdatedOn',
		'rowguid'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->PatientInvestigationID)) {
				$model->PatientInvestigationID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientInvestigationID'],
		);
    }

	public function patient()
	{
		return $this->belongsTo(Patient::class, 'PatientID');
	}
}
