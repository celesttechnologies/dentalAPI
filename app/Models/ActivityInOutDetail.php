<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ActivityInOutDetail
 * 
 * @property int $ActivityDetailId
 * @property int $ActivityHeaderId
 * @property string $ItemId
 * @property int $Quantity
 * @property float $Price
 *
 * @package App\Models
 */
class ActivityInOutDetail extends Model
{
	protected $table = 'ActivityInOutDetail';
	protected $primaryKey = 'ActivityDetailId';
	public $timestamps = false;

	protected $casts = [
		'ActivityHeaderId' => 'int',
		'Quantity' => 'int',
		'Price' => 'float'
	];

	protected $fillable = [
		'ActivityHeaderId',
		'ItemId',
		'Quantity',
		'Price'
	];

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ActivityDetailId'],
		);
    }
}
