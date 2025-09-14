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
 * Class ClinicAttributesMaster
 * 
 * @property string $ClinicAttributeMasterID
 * @property string|null $AttributeName
 * @property string|null $AttributeDescription
 * @property int|null $Importance
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property string|null $rowguid
 *
 * @package App\Models
 */
class ClinicAttributesMaster extends Model
{
	protected $table = 'ClinicAttributesMaster';
	protected $primaryKey = 'ClinicAttributeMasterID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Importance' => 'int',
		'CreatedOn' => 'datetime'
	];

	protected $fillable = [
		'AttributeName',
		'AttributeDescription',
		'Importance',
		'CreatedOn',
		'CreatedBy',
		'rowguid'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ClinicAttributeMasterID)) {
				$model->ClinicAttributeMasterID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ClinicAttributeMasterID'],
		);
    }
}
