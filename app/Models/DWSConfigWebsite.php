<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class DWSConfigWebsite
 * 
 * @property string $ClinicWebSiteID
 * @property string $ClinicID
 * @property string|null $ClinicURL
 * @property string|null $ClinicName
 * @property string|null $ClinicDescription
 * @property string|null $ClinicAddress
 * @property string|null $City
 * @property string|null $State
 * @property string|null $ZipCode
 * @property string|null $PhoneNumber
 * @property string|null $ClinicMapPath
 * @property string|null $AboutHeadDoctor
 * @property int|null $DefaultThemeID
 * @property int|null $DefaultLanguageID
 * @property string|null $FacebookURL
 * @property string|null $LinkedInURL
 * @property string|null $TwitterURL
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property string|null $ClinicLogo
 * @property string|null $ContactEmail
 * @property string|null $SubDomain
 * 
 * @property Collection|DWSCofigGalleryAlbum[] $d_w_s_cofig_gallery_albums
 * @property Collection|DWSConfigClinicTiming[] $d_w_s_config_clinic_timings
 * @property Collection|DWSConfigProvider[] $d_w_s_config_providers
 * @property Collection|DWSConfigService[] $d_w_s_config_services
 *
 * @package App\Models
 */
class DWSConfigWebsite extends Model
{
	protected $table = 'DWS_Config_Websites';
	protected $primaryKey = 'ClinicWebSiteID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'DefaultThemeID' => 'int',
		'DefaultLanguageID' => 'int',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'ClinicURL',
		'ClinicName',
		'ClinicDescription',
		'ClinicAddress',
		'City',
		'State',
		'ZipCode',
		'PhoneNumber',
		'ClinicMapPath',
		'AboutHeadDoctor',
		'DefaultThemeID',
		'DefaultLanguageID',
		'FacebookURL',
		'LinkedInURL',
		'TwitterURL',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'ClinicLogo',
		'ContactEmail',
		'SubDomain'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ClinicWebSiteID)) {
				$model->ClinicWebSiteID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ClinicWebSiteID'],
		);
    }

	public function d_w_s_cofig_gallery_albums()
	{
		return $this->hasMany(DWSCofigGalleryAlbum::class, 'ClinicWebSiteID');
	}

	public function d_w_s_config_clinic_timings()
	{
		return $this->hasMany(DWSConfigClinicTiming::class, 'ClinicWebSiteID');
	}

	public function d_w_s_config_providers()
	{
		return $this->hasMany(DWSConfigProvider::class, 'ClinicWebSiteID');
	}

	public function d_w_s_config_services()
	{
		return $this->hasMany(DWSConfigService::class, 'ClinicWebSiteID');
	}
}
