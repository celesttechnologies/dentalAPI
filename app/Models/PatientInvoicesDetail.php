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
 * Class PatientInvoicesDetail
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
class PatientInvoicesDetail extends Model
{
	protected $table = 'PatientInvoicesDetails';
	protected $primaryKey = 'InvoiceDetailID';
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

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->InvoiceDetailID)) {
				$model->InvoiceDetailID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['InvoiceDetailID'],
		);
    }
}
