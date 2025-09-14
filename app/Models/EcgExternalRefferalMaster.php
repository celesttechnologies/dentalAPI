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
 * Class EcgExternalRefferalMaster
 * 
 * @property string $ExternalRefferalMasterId
 * @property string|null $ClinicId
 * @property string|null $RefferalName
 * @property string|null $MobileNumber
 * @property string|null $CountryDialCode
 * @property string|null $Description
 * @property string|null $EmailId
 * @property bool|null $IsDeleted
 * @property string|null $CreatedBy
 * @property Carbon|null $CreatedOn
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 *
 * @package App\Models
 */
class EcgExternalRefferalMaster extends Model
{
	protected $table = 'Ecg_ExternalRefferalMaster';
	protected $primaryKey = 'ExternalRefferalMasterId';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicId',
		'RefferalName',
		'MobileNumber',
		'CountryDialCode',
		'Description',
		'EmailId',
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
			if (empty($model->ExternalRefferalMasterId)) {
				$model->ExternalRefferalMasterId = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ExternalRefferalMasterId'],
		);
    }
}
