<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class PatientNote extends Model
{
    use HasUuids;
    protected $table = 'PatientNotes';
    protected $primaryKey = 'PatientNoteID';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'PatientNoteID',
        'PatientID',
        'Note',
        'CreatedOn',
        'CreatedBy',
        'LastUpdatedOn',
        'LastUpdatedBy',
    ];

    protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->PatientNoteID)) {
				$model->PatientNoteID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientNoteID'],
		);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID', 'PatientID');
    }
}
