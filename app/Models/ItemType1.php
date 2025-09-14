<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ItemType1
 * 
 * @property int $ItemTypeID
 * @property string $Name
 * @property string|null $AddedBy
 * @property Carbon $AddedOn
 * @property string|null $LastUpdatedBy
 * @property Carbon|null $LastUpdatedOn
 *
 * @package App\Models
 */
class ItemType1 extends Model
{
	protected $table = 'ItemType1';
	protected $primaryKey = 'ItemTypeID';
	public $timestamps = false;

	protected $casts = [
		'AddedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'Name',
		'AddedBy',
		'AddedOn',
		'LastUpdatedBy',
		'LastUpdatedOn'
	];

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ItemTypeID'],
		);
    }
}
