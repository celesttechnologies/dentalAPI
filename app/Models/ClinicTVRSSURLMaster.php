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
 * Class ClinicTVRSSURLMaster
 * 
 * @property string $NewsTickerRSSMasterID
 * @property string|null $RSSTitle
 * @property string|null $RSSDescription
 * @property string|null $RSSURL
 * @property string|null $RSSXML
 * @property bool|null $IsUserConfigurable
 * @property bool|null $IsOnlineFeed
 * @property bool|null $IsAutoSync
 * @property int|null $SyncFrequency
 * @property Carbon|null $LastSyncTime
 * @property bool|null $IsDeleted
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 *
 * @package App\Models
 */
class ClinicTVRSSURLMaster extends Model
{
	protected $table = 'Clinic_TV_RSSURLMaster';
	protected $primaryKey = 'NewsTickerRSSMasterID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsUserConfigurable' => 'bool',
		'IsOnlineFeed' => 'bool',
		'IsAutoSync' => 'bool',
		'SyncFrequency' => 'int',
		'LastSyncTime' => 'datetime',
		'IsDeleted' => 'bool',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'RSSTitle',
		'RSSDescription',
		'RSSURL',
		'RSSXML',
		'IsUserConfigurable',
		'IsOnlineFeed',
		'IsAutoSync',
		'SyncFrequency',
		'LastSyncTime',
		'IsDeleted',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->NewsTickerRSSMasterID)) {
				$model->NewsTickerRSSMasterID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['NewsTickerRSSMasterID'],
		);
    }
}
