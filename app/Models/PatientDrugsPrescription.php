<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class PatientDrugsPrescription
 * 
 * @property string $PatientDrugsPrescriptionsID
 * @property string $PatientPrescriptionID
 * @property string $DrugID
 * @property int $FrequencyID
 * @property string|null $DosageID
 * @property string|null $Duration
 * @property string|null $DrugNote
 * 
 * @property Drug $drug
 * @property PatientPrescription $patient_prescription
 *
 * @package App\Models
 */
class PatientDrugsPrescription extends Model
{
	protected $table = 'PatientDrugsPrescription';
	protected $primaryKey = 'PatientDrugsPrescriptionsID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'FrequencyID' => 'int'
	];

	protected $fillable = [
		'PatientPrescriptionID',
		'DrugID',
		'FrequencyID',
		'DosageID',
		'Duration',
		'DrugNote'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->PatientDrugsPrescriptionsID)) {
				$model->PatientDrugsPrescriptionsID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientDrugsPrescriptionsID'],
		);
    }

	public function drug()
	{
		return $this->belongsTo(Drug::class, 'DrugID');
	}

	public function patient_prescription()
	{
		return $this->belongsTo(PatientPrescription::class, 'PatientPrescriptionID');
	}
}
