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
 * Class PersonalReminderNote
 * 
 * @property string $PersonalReminderNotesId
 * @property string|null $ReminderId
 * @property Carbon|null $NotesDate
 * @property string|null $Notes
 * @property bool $IsDeleted
 * @property string $CreatedBy
 * @property Carbon $CreatedOn
 * @property string $LastUpdatedBy
 * @property Carbon $LastUpdatedOn
 *
 * @package App\Models
 */
class PersonalReminderNote extends Model
{
	protected $table = 'PersonalReminderNotes';
	protected $primaryKey = 'PersonalReminderNotesId';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'NotesDate' => 'datetime',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ReminderId',
		'NotesDate',
		'Notes',
		'IsDeleted',
		'CreatedBy',
		'CreatedOn',
		'LastUpdatedBy',
		'LastUpdatedOn'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->PersonalReminderNotesId)) {
				$model->PersonalReminderNotesId = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PersonalReminderNotesId'],
		);
    }
}
