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
 * Class PurchaseOrderHeader
 * 
 * @property string $PurchaseOrderHeaderId
 * @property string $ClinicID
 * @property string $PurchaseOrderNo
 * @property Carbon $PurchaseOrderDate
 * @property string $ItemSupplierID
 * @property string|null $InvoiceNo
 * @property Carbon|null $InvoiceDate
 * @property string|null $Naration
 * @property Carbon|null $ArrivalDate
 * @property float $Total
 * @property float $Tax
 * @property float|null $OtherExp
 * @property float $Discount
 * @property float $GrandTotal
 * @property float $PaidAmt
 * @property float $BalanceAmt
 * @property bool|null $IsDeleted
 * @property string|null $CreateBy
 * @property Carbon $CreateOn
 * @property string|null $LastUpdatedBy
 * @property Carbon $LastUpdatedOn
 * @property float|null $LessAmt
 * @property string|null $rowguid
 *
 * @package App\Models
 */
class PurchaseOrderHeader extends Model
{
	protected $table = 'PurchaseOrderHeader';
	protected $primaryKey = 'PurchaseOrderHeaderId';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'PurchaseOrderDate' => 'datetime',
		'InvoiceDate' => 'datetime',
		'ArrivalDate' => 'datetime',
		'Total' => 'float',
		'Tax' => 'float',
		'OtherExp' => 'float',
		'Discount' => 'float',
		'GrandTotal' => 'float',
		'PaidAmt' => 'float',
		'BalanceAmt' => 'float',
		'IsDeleted' => 'bool',
		'CreateOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'LessAmt' => 'float'
	];

	protected $fillable = [
		'ClinicID',
		'PurchaseOrderNo',
		'PurchaseOrderDate',
		'ItemSupplierID',
		'InvoiceNo',
		'InvoiceDate',
		'Naration',
		'ArrivalDate',
		'Total',
		'Tax',
		'OtherExp',
		'Discount',
		'GrandTotal',
		'PaidAmt',
		'BalanceAmt',
		'IsDeleted',
		'CreateBy',
		'CreateOn',
		'LastUpdatedBy',
		'LastUpdatedOn',
		'LessAmt',
		'rowguid'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->PurchaseOrderHeaderId)) {
				$model->PurchaseOrderHeaderId = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PurchaseOrderHeaderId'],
		);
    }
}
