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
 * Class PurchaseOrderDetail
 * 
 * @property string $PurchaseOrderDetailId
 * @property string $PurchaseOrderHeaderId
 * @property string $ItemID
 * @property int|null $Qty
 * @property float|null $Rate
 * @property float|null $Amount
 * @property Carbon|null $ManufacturingDate
 * @property Carbon|null $ExpiryDate
 * @property string|null $BatchNumber
 * @property Carbon|null $BatchDate
 *
 * @package App\Models
 */
class PurchaseOrderDetail extends Model
{
	protected $table = 'PurchaseOrderDetail';
	protected $primaryKey = 'PurchaseOrderDetailId';
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
		'PurchaseOrderHeaderId',
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
			if (empty($model->PurchaseOrderDetailId)) {
				$model->PurchaseOrderDetailId = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PurchaseOrderDetailId'],
		);
    }

	public function purchaseOrderHeader()
	{
		return $this->belongsTo(PurchaseOrderHeader::class, 'PurchaseOrderHeaderId');
	}

	public function item()
	{
		return $this->belongsTo(Item::class, 'ItemID');
	}
}
