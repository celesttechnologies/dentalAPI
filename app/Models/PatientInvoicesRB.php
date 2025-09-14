<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PatientInvoicesRB
 * 
 * @property string $InvoiceDetailID
 * @property string|null $InvoiceID
 * @property string|null $PatientTreatmentDoneID
 * @property Carbon|null $TreatmentDate
 * @property string|null $TreatmentSummary
 * @property float|null $TreatmentCost
 * @property float|null $TreatmentAddition
 * @property float|null $TreatmentDiscount
 * @property float|null $TreatmentTax
 * @property float|null $TreatmentTotalCost
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 *
 * @package App\Models
 */
class PatientInvoicesRB extends Model
{
	protected $table = 'PatientInvoicesRB';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'TreatmentDate' => 'datetime',
		'TreatmentCost' => 'float',
		'TreatmentAddition' => 'float',
		'TreatmentDiscount' => 'float',
		'TreatmentTax' => 'float',
		'TreatmentTotalCost' => 'float',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'InvoiceDetailID',
		'InvoiceID',
		'PatientTreatmentDoneID',
		'TreatmentDate',
		'TreatmentSummary',
		'TreatmentCost',
		'TreatmentAddition',
		'TreatmentDiscount',
		'TreatmentTax',
		'TreatmentTotalCost',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];
}
