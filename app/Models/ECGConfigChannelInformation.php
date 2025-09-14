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
 * Class ECGConfigChannelInformation
 * 
 * @property string $ChannelInformationID
 * @property string|null $ECGChannelID
 * @property string|null $InformationTitle
 * @property string|null $TitleLink
 * @property string|null $TitleLinkTag
 * @property string|null $Description
 * @property string|null $OtherLink
 * @property string|null $OtherLinkTag
 * @property Carbon|null $PublishTill
 * @property bool|null $IsActive
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * 
 * @property ECGConfigChannel|null $e_c_g_config_channel
 *
 * @package App\Models
 */
class ECGConfigChannelInformation extends Model
{
	protected $table = 'ECG_Config_ChannelInformation';
	protected $primaryKey = 'ChannelInformationID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'PublishTill' => 'datetime',
		'IsActive' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ECGChannelID',
		'InformationTitle',
		'TitleLink',
		'TitleLinkTag',
		'Description',
		'OtherLink',
		'OtherLinkTag',
		'PublishTill',
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
			if (empty($model->ChannelInformationID)) {
				$model->ChannelInformationID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ChannelInformationID'],
		);
    }

	public function e_c_g_config_channel()
	{
		return $this->belongsTo(ECGConfigChannel::class, 'ECGChannelID');
	}
}
