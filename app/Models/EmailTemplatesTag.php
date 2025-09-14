<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class EmailTemplatesTag
 * 
 * @property string $EmailTemplatesTagID
 * @property string|null $EmailTagCode
 * @property string|null $EmailTagDescription
 * @property string|null $EmailTagQuery
 * @property bool|null $IsDeleted
 *
 * @package App\Models
 */
class EmailTemplatesTag extends Model
{
	protected $table = 'EmailTemplatesTag';
	protected $primaryKey = 'EmailTemplatesTagID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsDeleted' => 'bool'
	];

	protected $fillable = [
		'EmailTagCode',
		'EmailTagDescription',
		'EmailTagQuery',
		'IsDeleted'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->EmailTemplatesTagID)) {
				$model->EmailTemplatesTagID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['EmailTemplatesTagID'],
		);
    }
}
