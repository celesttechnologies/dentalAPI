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
 * Class ECGWebRequest
 * 
 * @property string $RequestID
 * @property int $RequestIntID
 * @property int|null $RequestTypeID
 * @property string|null $FirstName
 * @property string|null $LastName
 * @property string|null $Email
 * @property string|null $ContactNumber
 * @property string|null $ClinicName
 * @property string|null $ClinicAddress
 * @property string|null $OtherDetails
 * @property int|null $status
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 *
 * @package App\Models
 */
class ECGWebRequest extends Model
{
	protected $table = 'ECG_WebRequests';
	protected $primaryKey = 'RequestID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'RequestIntID' => 'int',
		'RequestTypeID' => 'int',
		'status' => 'int',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'RequestIntID',
		'RequestTypeID',
		'FirstName',
		'LastName',
		'Email',
		'ContactNumber',
		'ClinicName',
		'ClinicAddress',
		'OtherDetails',
		'status',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->RequestID)) {
				$model->RequestID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['RequestID'],
		);
    }
}
