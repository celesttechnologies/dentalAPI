<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ItemStock
 * 
 * @property int $ItemStockId
 * @property string $ItemId
 * @property int $Quantity
 * @property string|null $ClinicID
 *
 * @package App\Models
 */
class ItemStock extends Model
{
	protected $table = 'ItemStock';
	protected $primaryKey = 'ItemStockId';
	public $timestamps = false;

	protected $casts = [
		'Quantity' => 'int'
	];

	protected $fillable = [
		'ItemId',
		'Quantity',
		'ClinicID'
	];

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ItemStockID'],
		);
    }
}
