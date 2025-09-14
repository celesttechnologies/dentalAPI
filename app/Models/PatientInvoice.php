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
 * Class PatientInvoice
 * 
 * @property string $InvoiceID
 * @property string|null $ClinicID
 * @property int $InvoiceNo
 * @property string $InvoiceNumber
 * @property int|null $ManualInvoiceNo
 * @property string|null $InvoiceCodePrefix
 * @property Carbon|null $InvoiceDate
 * @property string|null $PatientID
 * @property string|null $PatientTreatmentDoneID
 * @property float|null $TreatmentCost
 * @property float|null $TreatmentAddition
 * @property float|null $TreatmentDiscount
 * @property float|null $TreatmentTax
 * @property float|null $TreatmentTotalCost
 * @property float|null $TreatmentTotalPayment
 * @property float|null $TreatmentBalance
 * @property bool|null $IsDeleted
 * @property bool|null $IsCancelled
 * @property string|null $CancellationNotes
 * @property int|null $Status
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property string|null $rowguid
 * @property string|null $LastUpdatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $Notes
 *
 * @package App\Models
 */
class PatientInvoice extends Model
{
	protected $table = 'PatientInvoices';
	protected $primaryKey = 'InvoiceID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'InvoiceNo' => 'int',
		'ManualInvoiceNo' => 'int',
		'InvoiceDate' => 'datetime',
		'TreatmentCost' => 'float',
		'TreatmentAddition' => 'float',
		'TreatmentDiscount' => 'float',
		'TreatmentTax' => 'float',
		'TreatmentTotalCost' => 'float',
		'TreatmentTotalPayment' => 'float',
		'TreatmentBalance' => 'float',
		'IsDeleted' => 'bool',
		'IsCancelled' => 'bool',
		'Status' => 'int',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'InvoiceNo',
		'InvoiceNumber',
		'ManualInvoiceNo',
		'InvoiceCodePrefix',
		'InvoiceDate',
		'PatientID',
		'PatientTreatmentDoneID',
		'TreatmentCost',
		'TreatmentAddition',
		'TreatmentDiscount',
		'TreatmentTax',
		'TreatmentTotalCost',
		'TreatmentTotalPayment',
		'TreatmentBalance',
		'IsDeleted',
		'IsCancelled',
		'CancellationNotes',
		'Status',
		'CreatedOn',
		'CreatedBy',
		'rowguid',
		'LastUpdatedBy',
		'LastUpdatedOn',
		'Notes'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->InvoiceID)) {
				$model->InvoiceID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['InvoiceID'],
		);
    }

    public function invoiceDetails()
    {
        return $this->hasMany(PatientInvoicesDetail::class, 'InvoiceID', 'InvoiceID');
    }

    public function invoiceRB()
    {
        return $this->hasMany(PatientInvoicesRB::class, 'InvoiceID', 'InvoiceID');
    }
}
