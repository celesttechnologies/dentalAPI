<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * 
 * @property int $CountryID
 * @property string|null $CountryCode
 * @property string|null $CountryName
 * @property string|null $LastUpdatedBy
 * @property Carbon|null $LastUpdatedOn
 *
 * @package App\Models
 */
class Country extends Model
{
	protected $table = 'countries';
	protected $primaryKey = 'CountryID';
	public $timestamps = false;

	protected $casts = [
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'CountryCode',
		'CountryName',
		'LastUpdatedBy',
		'LastUpdatedOn'
	];

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['CountryID'],
		);
    }
}
