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
 * Class DWSConfigClinicTiming
 * 
 * @property string $ClinicTimingID
 * @property string|null $ClinicWebSiteID
 * @property int|null $DayID
 * @property string|null $DayofWeek
 * @property string|null $TimingsText
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * 
 * @property DWSConfigWebsite|null $d_w_s_config_website
 *
 * @package App\Models
 */
class DWSConfigClinicTiming extends Model
{
	protected $table = 'DWS_Config_ClinicTimings';
	protected $primaryKey = 'ClinicTimingID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'DayID' => 'int',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicWebSiteID',
		'DayID',
		'DayofWeek',
		'TimingsText',
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
			if (empty($model->ClinicTimingID)) {
				$model->ClinicTimingID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ClinicTimingID'],
		);
    }

	public function d_w_s_config_website()
	{
		return $this->belongsTo(DWSConfigWebsite::class, 'ClinicWebSiteID');
	}
}
