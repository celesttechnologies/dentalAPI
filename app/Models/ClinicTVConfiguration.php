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
 * Class ClinicTVConfiguration
 * 
 * @property string $ClinicTVConfigurationID
 * @property string $ClinicID
 * @property string|null $ClinicName
 * @property string|null $Location
 * @property string|null $CustomText1
 * @property string|null $CustomText2
 * @property string|null $LogoPath
 * @property string|null $ClinicLogo
 * @property string|null $MainScreenDisplayPath
 * @property string|null $SideScreenDisplayPath
 * @property string|null $VideoDisplayPath
 * @property bool|null $AppointmentDisplayFlag
 * @property bool|null $ScreenDisplayFlag
 * @property bool|null $TestimonialDisplayFlag
 * @property bool|null $SideScreenDisplayFlag
 * @property bool|null $MediaScreenDisplayFlag
 * @property int|null $AppointmentDisplayTimePeriod
 * @property int|null $ScreenDisplayTimePeriod
 * @property int|null $TestimonialDisplayTimePeriod
 * @property int|null $SideScreenDisplayTimePeriod
 * @property int|null $NoOfScreensPerCycle
 * @property int|null $NoOfTestimonialPerCycle
 * @property int|null $NoOfMediaPerCycle
 * @property bool|null $IsNewstickerDisplay
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 *
 * @package App\Models
 */
class ClinicTVConfiguration extends Model
{
	protected $table = 'Clinic_TV_Configuration';
	protected $primaryKey = 'ClinicTVConfigurationID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'AppointmentDisplayFlag' => 'bool',
		'ScreenDisplayFlag' => 'bool',
		'TestimonialDisplayFlag' => 'bool',
		'SideScreenDisplayFlag' => 'bool',
		'MediaScreenDisplayFlag' => 'bool',
		'AppointmentDisplayTimePeriod' => 'int',
		'ScreenDisplayTimePeriod' => 'int',
		'TestimonialDisplayTimePeriod' => 'int',
		'SideScreenDisplayTimePeriod' => 'int',
		'NoOfScreensPerCycle' => 'int',
		'NoOfTestimonialPerCycle' => 'int',
		'NoOfMediaPerCycle' => 'int',
		'IsNewstickerDisplay' => 'bool',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'ClinicName',
		'Location',
		'CustomText1',
		'CustomText2',
		'LogoPath',
		'ClinicLogo',
		'MainScreenDisplayPath',
		'SideScreenDisplayPath',
		'VideoDisplayPath',
		'AppointmentDisplayFlag',
		'ScreenDisplayFlag',
		'TestimonialDisplayFlag',
		'SideScreenDisplayFlag',
		'MediaScreenDisplayFlag',
		'AppointmentDisplayTimePeriod',
		'ScreenDisplayTimePeriod',
		'TestimonialDisplayTimePeriod',
		'SideScreenDisplayTimePeriod',
		'NoOfScreensPerCycle',
		'NoOfTestimonialPerCycle',
		'NoOfMediaPerCycle',
		'IsNewstickerDisplay',
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
			if (empty($model->ClinicTVConfigurationID)) {
				$model->ClinicTVConfigurationID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ClinicTVConfigurationID'],
		);
    }
}
