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
 * Class EcgExternalRefferalDatum
 * 
 * @property string $ExternalRefferalDataId
 * @property string $ExternalRefferalMasterId
 * @property string|null $PatientId
 * @property string|null $ClinicId
 * @property bool|null $IsDeleted
 * @property string|null $CreatedBy
 * @property Carbon|null $CreatedOn
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 *
 * @package App\Models
 */
class EcgExternalRefferalDatum extends Model
{
	protected $table = 'Ecg_ExternalRefferalData';
	protected $primaryKey = 'ExternalRefferalDataId';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ExternalRefferalMasterId',
		'PatientId',
		'ClinicId',
		'IsDeleted',
		'CreatedBy',
		'CreatedOn',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ExternalRefferalDataId)) {
				$model->ExternalRefferalDataId = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ExternalRefferalDataId'],
		);
    }
}
