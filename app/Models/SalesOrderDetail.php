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
 * Class SalesOrderDetail
 * 
 * @property string $SalesOrderDetailId
 * @property string $SalesOrderHeaderId
 * @property string $ItemID
 * @property int|null $Qty
 * @property float|null $Rate
 * @property float|null $Amount
 * @property Carbon|null $ManufacturingDate
 * @property Carbon|null $ExpiryDate
 * @property string|null $BatchNumber
 * @property Carbon|null $BatchDate
 * 
 * @property SalesOrderHeader $sales_order_header
 *
 * @package App\Models
 */
class SalesOrderDetail extends Model
{
	protected $table = 'SalesOrderDetail';
	protected $primaryKey = 'SalesOrderDetailId';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Qty' => 'int',
		'Rate' => 'float',
		'Amount' => 'float',
		'ManufacturingDate' => 'datetime',
		'ExpiryDate' => 'datetime',
		'BatchDate' => 'datetime'
	];

	protected $fillable = [
		'SalesOrderHeaderId',
		'ItemID',
		'Qty',
		'Rate',
		'Amount',
		'ManufacturingDate',
		'ExpiryDate',
		'BatchNumber',
		'BatchDate'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->SalesOrderDetailId)) {
				$model->SalesOrderDetailId = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['SalesOrderDetailId'],
		);
    }

	public function sales_order_header()
	{
		return $this->belongsTo(SalesOrderHeader::class, 'SalesOrderHeaderId');
	}
}
