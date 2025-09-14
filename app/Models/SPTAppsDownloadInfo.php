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
 * Class SPTAppsDownloadInfo
 * 
 * @property string $DownloadID
 * @property string|null $username
 * @property int|null $ApplicationTypeID
 * @property Carbon|null $DownloadedOn
 * @property string|null $IPAddress
 * @property string|null $FingerPrint
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property string|null $rowguid
 *
 * @package App\Models
 */
class SPTAppsDownloadInfo extends Model
{
	protected $table = 'SPT_AppsDownloadInfo';
	protected $primaryKey = 'DownloadID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ApplicationTypeID' => 'int',
		'DownloadedOn' => 'datetime',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'username',
		'ApplicationTypeID',
		'DownloadedOn',
		'IPAddress',
		'FingerPrint',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'rowguid'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->DownloadID)) {
				$model->DownloadID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['DownloadID'],
		);
    }
}
