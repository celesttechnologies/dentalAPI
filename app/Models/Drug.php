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
 * Class Drug
 * 
 * @property string $DrugId
 * @property string|null $ClinicID
 * @property string $GenericName
 * @property string|null $Contraindications
 * @property string|null $Interactions
 * @property string|null $AdverseEffects
 * @property string|null $OverdozeManagement
 * @property string|null $Precautions
 * @property string|null $PatientAlerts
 * @property string|null $OtherInfo
 * @property string|null $LastUpdatedBy
 * @property Carbon $LastUpdatedOn
 * @property bool $IsDeleted
 * @property string|null $CreatedBy
 * @property Carbon $CreatedOn
 * @property string|null $rowguid
 * 
 * @property Collection|PatientDrugsPrescription[] $patient_drugs_prescriptions
 *
 * @package App\Models
 */
class Drug extends Model
{
	protected $table = 'Drugs';
	protected $primaryKey = 'DrugId';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'LastUpdatedOn' => 'datetime',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'GenericName',
		'Contraindications',
		'Interactions',
		'AdverseEffects',
		'OverdozeManagement',
		'Precautions',
		'PatientAlerts',
		'OtherInfo',
		'LastUpdatedBy',
		'LastUpdatedOn',
		'IsDeleted',
		'CreatedBy',
		'CreatedOn',
		'rowguid'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->DrugId)) {
				$model->DrugId = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['DrugId'],
		);
    }

	public function patient_drugs_prescriptions()
	{
		return $this->hasMany(PatientDrugsPrescription::class, 'DrugID');
	}
}
