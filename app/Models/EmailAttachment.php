<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class EmailAttachment
 * 
 * @property string $EmailAttachmentsID
 * @property string|null $AttachmentPath
 *
 * @package App\Models
 */
class EmailAttachment extends Model
{
	protected $table = 'EmailAttachments';
	protected $primaryKey = 'EmailAttachmentsID';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'AttachmentPath'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->EmailAttachmentsID)) {
				$model->EmailAttachmentsID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['EmailAttachmentsID'],
		);
    }
}
