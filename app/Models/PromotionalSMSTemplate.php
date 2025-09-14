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
 * Class PromotionalSMSTemplate
 * 
 * @property string $PromotionalSMSTemplateID
 * @property string|null $ClinicID
 * @property string|null $Title
 * @property string|null $Message
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 *
 * @package App\Models
 */
class PromotionalSMSTemplate extends Model
{
	protected $table = 'PromotionalSMSTemplates';
	protected $primaryKey = 'PromotionalSMSTemplateID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'PromotionalSMSTemplateID',
		'ClinicID',
		'Title',
		'Message',
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
			if (empty($model->PromotionalSMSTemplateID)) {
				$model->PromotionalSMSTemplateID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PromotionalSMSTemplateID'],
		);
    }
}
