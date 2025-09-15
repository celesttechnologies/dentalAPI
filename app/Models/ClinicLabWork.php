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
 * Class ClinicLabWork
 * 
 * @property string $LabWorkID
 * @property string|null $ClinicID
 * @property int|null $OrderNo
 * @property string|null $OrderNumber
 * @property string|null $ProviderID
 * @property string|null $PatientID
 * @property Carbon|null $LabWorkDate
 * @property string|null $LabSupplierID
 * @property Carbon|null $DeliveryDate
 * @property int|null $OrderType
 * @property string|null $ParentLabWorkID
 * @property string|null $StageID
 * @property string|null $SentRecievedIDCSV
 * @property string|null $Shade
 * @property string|null $SelectedTeeth
 * @property string|null $PonticDesignsIDCSV
 * @property string|null $CollarMetalDesignsIDCSV
 * @property float|null $TotalCost
 * @property string $Instructions
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $lastUpdatedBy
 * @property int|null $LabStatus
 * @property string|null $WarrantyDetails
 * @property Carbon|null $LabInvoiceDate
 * @property string|null $LabInvoiceNumber
 * 
 * @property Clinic|null $clinic
 * @property Patient|null $patient
 * @property Collection|ClinicLabWorkDetail[] $clinic_lab_work_details
 *
 * @package App\Models
 */
class ClinicLabWork extends Model
{
	protected $table = 'ClinicLabWork';
	protected $primaryKey = 'LabWorkID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'OrderNo' => 'int',
		'LabWorkDate' => 'datetime',
		'DeliveryDate' => 'datetime',
		'OrderType' => 'int',
		'TotalCost' => 'float',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'LabStatus' => 'int',
		'LabInvoiceDate' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'OrderNo',
		'OrderNumber',
		'ProviderID',
		'PatientID',
		'LabWorkDate',
		'LabSupplierID',
		'DeliveryDate',
		'OrderType',
		'ParentLabWorkID',
		'StageID',
		'SentRecievedIDCSV',
		'Shade',
		'SelectedTeeth',
		'PonticDesignsIDCSV',
		'CollarMetalDesignsIDCSV',
		'TotalCost',
		'Instructions',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'lastUpdatedBy',
		'LabStatus',
		'WarrantyDetails',
		'LabInvoiceDate',
		'LabInvoiceNumber',
		'TreatmentID'
	];

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new \App\Scopes\DoctorScope);
		static::creating(function ($model) {
			if (empty($model->LabWorkID)) {
				$model->LabWorkID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['LabWorkID'],
		);
    }

	public function clinic()
	{
		return $this->belongsTo(Clinic::class, 'ClinicID');
	}

	public function provider()
	{
		return $this->belongsTo(Provider::class, 'ProviderID');
	}

	public function patient()
	{
		return $this->belongsTo(Patient::class, 'PatientID');
	}

	public function clinic_lab_work_details()
	{
		return $this->hasOne(ClinicLabWorkDetail::class, 'LabWorkID', 'LabWorkID');
	}

	public function lab()
	{
		return $this->belongsTo(ClinicLabSupplier::class, 'LabSupplierID', 'LabSupplierID');
	}

	public function stage()
	{
		return $this->belongsTo(LookUp::class, 'StageID', 'id');
	}
}
