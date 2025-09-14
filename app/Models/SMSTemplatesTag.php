<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class SMSTemplatesTag
 * 
 * @property string $SMSTemplatesTagID
 * @property string|null $SMSTagCode
 * @property string|null $SMSTagDescription
 * @property string|null $DefaultValue
 * @property string|null $SMSTagQuery
 * @property bool|null $IsDeleted
 *
 * @package App\Models
 */
class SMSTemplatesTag extends Model
{
	protected $table = 'SMSTemplatesTag';
	protected $primaryKey = 'SMSTemplatesTagID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsDeleted' => 'bool'
	];

	protected $fillable = [
		'SMSTagCode',
		'SMSTagDescription',
		'DefaultValue',
		'SMSTagQuery',
		'IsDeleted'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->SMSTemplatesTagID)) {
				$model->SMSTemplatesTagID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['SMSTemplatesTagID'],
		);
    }
}
