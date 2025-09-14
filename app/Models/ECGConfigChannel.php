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
 * Class ECGConfigChannel
 * 
 * @property string $ECGChannelID
 * @property string|null $ClinicIDCSV
 * @property string|null $ChannelName
 * @property string|null $ChannelDescription
 * @property int|null $ChannelTypeID
 * @property Carbon|null $PublishFrom
 * @property Carbon|null $PublishTo
 * @property bool|null $IsActive
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * 
 * @property Collection|ECGConfigChannelInformation[] $e_c_g_config_channel_informations
 *
 * @package App\Models
 */
class ECGConfigChannel extends Model
{
	protected $table = 'ECG_Config_Channel';
	protected $primaryKey = 'ECGChannelID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ChannelTypeID' => 'int',
		'PublishFrom' => 'datetime',
		'PublishTo' => 'datetime',
		'IsActive' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicIDCSV',
		'ChannelName',
		'ChannelDescription',
		'ChannelTypeID',
		'PublishFrom',
		'PublishTo',
		'IsActive',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ECGChannelID)) {
				$model->ECGChannelID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ECGChannelID'],
		);
    }

	public function e_c_g_config_channel_informations()
	{
		return $this->hasMany(ECGConfigChannelInformation::class, 'ECGChannelID');
	}
}
