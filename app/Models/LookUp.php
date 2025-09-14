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
 * Class LookUp
 * 
 * @property string $id
 * @property string|null $ClinicID
 * @property int $ItemID
 * @property string $ItemTitle
 * @property string|null $ItemDescription
 * @property string $ItemCategory
 * @property bool|null $IsDeleted
 * @property int $Importance
 * @property string $LastUpdatedBy
 * @property Carbon $LastUpdatedOn
 * @property string|null $rowguid
 *
 * @package App\Models
 */
class LookUp extends Model
{
	protected $table = 'LookUps';
	protected $primaryKey = 'id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ItemID' => 'int',
		'IsDeleted' => 'bool',
		'Importance' => 'int',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'ItemID',
		'ItemTitle',
		'ItemDescription',
		'ItemCategory',
		'IsDeleted',
		'Importance',
		'LastUpdatedBy',
		'LastUpdatedOn',
		'rowguid'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->id)) {
				$model->id = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['id'],
		);
    }
}
