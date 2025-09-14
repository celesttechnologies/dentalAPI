<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ECGMTreatmentTypeHierarchy
 * 
 * @property string $TreatmentTypeID
 * @property string $ClinicID
 * @property string $Title
 * @property string|null $Description
 * @property string|null $ParentTreatmentTypeID
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property string|null $rowguid
 * @property float|null $GeneralTreatmentCost
 * @property float|null $SpecialistTreatmentCost
 * @property int|null $TreatmentSpecialityTypeID
 *
 * @package App\Models
 */
class ECGMTreatmentTypeHierarchy extends Model
{
	protected $table = 'ECG_M_TreatmentTypeHierarchy';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'GeneralTreatmentCost' => 'float',
		'SpecialistTreatmentCost' => 'float',
		'TreatmentSpecialityTypeID' => 'int'
	];

	protected $fillable = [
		'TreatmentTypeID',
		'ClinicID',
		'Title',
		'Description',
		'ParentTreatmentTypeID',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'rowguid',
		'GeneralTreatmentCost',
		'SpecialistTreatmentCost',
		'TreatmentSpecialityTypeID'
	];
}
