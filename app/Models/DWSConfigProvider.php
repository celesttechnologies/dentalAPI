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
 * Class DWSConfigProvider
 * 
 * @property string $ProviderWebsiteID
 * @property string|null $ClinicWebSiteID
 * @property string|null $ProviderID
 * @property string|null $ProviderName
 * @property string|null $ProviderDescription
 * @property string|null $ProviderContactNumber
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
class DWSConfigProvider extends Model
{
	protected $table = 'DWS_Config_Providers';
	protected $primaryKey = 'ProviderWebsiteID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicWebSiteID',
		'ProviderID',
		'ProviderName',
		'ProviderDescription',
		'ProviderContactNumber',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new \App\Scopes\DoctorScope);
		static::creating(function ($model) {
			if (empty($model->ProviderWebsiteID)) {
				$model->ProviderWebsiteID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ProviderWebsiteID'],
		);
    }

	public function d_w_s_config_website()
	{
		return $this->belongsTo(DWSConfigWebsite::class, 'ClinicWebSiteID');
	}
}
