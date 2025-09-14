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
 * Class Item
 * 
 * @property string $ItemID
 * @property string|null $ClinicID
 * @property string $ItemTypeID
 * @property string $ItemName
 * @property string|null $Manufacturer
 * @property string|null $Description
 * @property string|null $Measure
 * @property string|null $UnitOfMeasure
 * @property string|null $InternalPrescription
 * @property int|null $MinimumQuantity
 * @property int|null $MaximumQuantity
 * @property int|null $ReorderQuantity
 * @property float|null $Rate
 * @property string|null $AddedBy
 * @property Carbon $AddedOn
 * @property string|null $LastUpdatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property bool|null $IsDeleted
 * @property string|null $rowguid
 * @property string|null $Location
 * @property string|null $Shelflife
 *
 * @package App\Models
 */
class Item extends Model
{
	protected $table = 'Item';
	protected $primaryKey = 'ItemID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'MinimumQuantity' => 'int',
		'MaximumQuantity' => 'int',
		'ReorderQuantity' => 'int',
		'Rate' => 'float',
		'AddedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'IsDeleted' => 'bool'
	];

	protected $fillable = [
		'ClinicID',
		'ItemTypeID',
		'ItemName',
		'Manufacturer',
		'Description',
		'Measure',
		'UnitOfMeasure',
		'InternalPrescription',
		'MinimumQuantity',
		'MaximumQuantity',
		'ReorderQuantity',
		'Rate',
		'AddedBy',
		'AddedOn',
		'LastUpdatedBy',
		'LastUpdatedOn',
		'IsDeleted',
		'rowguid',
		'Location',
		'Shelflife'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ItemID)) {
				$model->ItemID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ItemID'],
		);
    }

	protected function itemType()
	{
		return $this->belongsTo(ItemType::class, 'ItemTypeID', 'ItemTypeID');
	}
}
