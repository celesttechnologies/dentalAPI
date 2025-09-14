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
 * Class PatientReceiptsDetail
 * 
 * @property string $ReceiptDetailID
 * @property string|null $ReceiptID
 * @property string|null $InvoiceID
 * @property string|null $PatientTreatmentDoneID
 * @property float|null $AmountPaid
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 *
 * @package App\Models
 */
class PatientReceiptsDetail extends Model
{
	protected $table = 'PatientReceiptsDetails';
	protected $primaryKey = 'ReceiptDetailID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'AmountPaid' => 'float',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ReceiptID',
		'InvoiceID',
		'PatientTreatmentDoneID',
		'AmountPaid',
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
			if (empty($model->ReceiptDetailID)) {
				$model->ReceiptDetailID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ReceiptDetailID'],
		);
    }
}
