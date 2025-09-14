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
 * Class DWSConfigService
 * 
 * @property string $ServiceID
 * @property string|null $ClinicWebSiteID
 * @property string|null $ServiceName
 * @property string|null $ServiceDescription
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
class DWSConfigService extends Model
{
	protected $table = 'DWS_Config_Services';
	protected $primaryKey = 'ServiceID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicWebSiteID',
		'ServiceName',
		'ServiceDescription',
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
			if (empty($model->ServiceID)) {
				$model->ServiceID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ServiceID'],
		);
    }

	public function d_w_s_config_website()
	{
		return $this->belongsTo(DWSConfigWebsite::class, 'ClinicWebSiteID');
	}
}
