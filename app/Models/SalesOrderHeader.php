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
 * Class SalesOrderHeader
 * 
 * @property string $SalesOrderHeaderId
 * @property string|null $ClinicID
 * @property string $SalesOrderNo
 * @property Carbon $SalesOrderDate
 * @property string $ItemCustomerID
 * @property string|null $InvoiceNo
 * @property Carbon|null $InvoiceDate
 * @property string|null $Naration
 * @property Carbon|null $DespatchDate
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
 * @property ItemCustomer $item_customer
 * @property Collection|SalesOrderDetail[] $sales_order_details
 *
 * @package App\Models
 */
class SalesOrderHeader extends Model
{
	protected $table = 'SalesOrderHeader';
	protected $primaryKey = 'SalesOrderHeaderId';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'SalesOrderDate' => 'datetime',
		'InvoiceDate' => 'datetime',
		'DespatchDate' => 'datetime',
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
		'SalesOrderNo',
		'SalesOrderDate',
		'ItemCustomerID',
		'InvoiceNo',
		'InvoiceDate',
		'Naration',
		'DespatchDate',
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
			if (empty($model->SalesOrderHeaderId)) {
				$model->SalesOrderHeaderId = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['SalesOrderHeaderId'],
		);
    }

	public function item_customer()
	{
		return $this->belongsTo(ItemCustomer::class, 'ItemCustomerID');
	}

	public function sales_order_details()
	{
		return $this->hasMany(SalesOrderDetail::class, 'SalesOrderHeaderId');
	}
}
