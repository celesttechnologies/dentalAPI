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
 * Class LookUpsMaster
 * 
 * @property string $LookUpMasterID
 * @property string|null $ClinicID
 * @property string|null $ItemCategory
 * @property string|null $ItemCategoryDescription
 * @property bool|null $IsDeleted
 * @property int|null $Importance
 * @property string|null $LastUpdatedBy
 * @property Carbon|null $LastUpdatedOn
 *
 * @package App\Models
 */
class LookUpsMaster extends Model
{
	protected $table = 'LookUpsMaster';
	protected $primaryKey = 'LookUpMasterID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsDeleted' => 'bool',
		'Importance' => 'int',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'ItemCategory',
		'ItemCategoryDescription',
		'IsDeleted',
		'Importance',
		'LastUpdatedBy',
		'LastUpdatedOn'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->LookUpMasterID)) {
				$model->LookUpMasterID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['LookUpMasterID'],
		);
    }
}
