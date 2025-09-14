<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class PatientTreatmentTypeDone
 * 
 * @property string $PatientTreatmentTypeDoneID
 * @property string $PatientTreatmentDoneID
 * @property string $TreatmentTypeID
 * @property string|null $TreatmentSubTypeID
 * @property string|null $TeethTreatment
 * @property string|null $TeethTreatmentNote
 * @property float|null $TreatmentCost
 * @property float|null $Discount
 * @property bool|null $IsDeleted
 * @property bool|null $IsExpanded
 * @property float|null $TreatmentTotalCost
 * @property float|null $TreatmentTax
 * @property float|null $Addition
 * @property float|null $AmountToBeCollected
 *
 * @package App\Models
 */
class PatientTreatmentTypeDone extends Model
{
	protected $table = 'PatientTreatmentTypeDone';
	protected $primaryKey = 'PatientTreatmentTypeDoneID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'TreatmentCost' => 'float',
		'Discount' => 'float',
		'IsDeleted' => 'bool',
		'IsExpanded' => 'bool',
		'TreatmentTotalCost' => 'float',
		'TreatmentTax' => 'float',
		'Addition' => 'float',
		'AmountToBeCollected' => 'float'
	];

	protected $fillable = [
		'PatientTreatmentDoneID',
		'TreatmentTypeID',
		'TreatmentSubTypeID',
		'TeethTreatment',
		'TeethTreatmentNote',
		'TreatmentCost',
		'Discount',
		'IsDeleted',
		'IsExpanded',
		'TreatmentTotalCost',
		'TreatmentTax',
		'Addition',
		'AmountToBeCollected'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->PatientTreatmentTypeDoneID)) {
				$model->PatientTreatmentTypeDoneID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientTreatmentTypeDoneID'],
		);
    }

	public function patientTreatment()
    {
        return $this->belongsTo(PatientTreatment::class, 'PatientTreatmentID', 'PatientTreatmentID');
    }

    public function patientTreatmentTypeDone()
    {
        return $this->hasMany(PatientTreatmentTypeDone::class, 'PatientTreatmentDoneID', 'PatientTreatmentDoneID');
    }
	
    public function treatmentTypeHierarchy()
    {
        return $this->belongsTo(TreatmentTypeHierarchy::class, 'TreatmentTypeID', 'TreatmentTypeID');
    }

    public function subTreatmentTypeHierarchy()
    {
        return $this->belongsTo(TreatmentTypeHierarchy::class, 'TreatmentSubTypeID', 'TreatmentTypeID');
    }
}
