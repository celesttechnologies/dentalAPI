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
 * Class ClinicTVClinicRSSDatum
 * 
 * @property string $ClinicRSSID
 * @property string|null $ClinicID
 * @property string|null $NewsTickerRSSMasterID
 * @property string|null $RSSURL
 * @property string|null $RSSTitle
 * @property string|null $RSSDescription
 * @property string|null $RSSXML
 * @property string|null $RSSText
 * @property bool|null $IsUserConfigurable
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 *
 * @package App\Models
 */
class ClinicTVClinicRSSDatum extends Model
{
	protected $table = 'Clinic_TV_ClinicRSSData';
	protected $primaryKey = 'ClinicRSSID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsUserConfigurable' => 'bool',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'NewsTickerRSSMasterID',
		'RSSURL',
		'RSSTitle',
		'RSSDescription',
		'RSSXML',
		'RSSText',
		'IsUserConfigurable',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ClinicRSSID)) {
				$model->ClinicRSSID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ClinicRSSID'],
		);
    }
}
