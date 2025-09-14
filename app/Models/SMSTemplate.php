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
 * Class SMSTemplate
 * 
 * @property string $SMSTemplateID
 * @property string|null $ClinicID
 * @property string|null $SituationID
 * @property int|null $SMSCategoryID
 * @property string|null $FromPhoneNumber
 * @property string|null $FromSenderID
 * @property string|null $Message
 * @property Carbon|null $EffectiveDate
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 *
 * @package App\Models
 */
class SMSTemplate extends Model
{
	protected $table = 'SMSTemplates';
	protected $primaryKey = 'SMSTemplateID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'SMSCategoryID' => 'int',
		'EffectiveDate' => 'datetime',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'SituationID',
		'SMSCategoryID',
		'FromPhoneNumber',
		'FromSenderID',
		'Message',
		'EffectiveDate',
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
			if (empty($model->SMSTemplateID)) {
				$model->SMSTemplateID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['SMSTemplateID'],
		);
    }
}
