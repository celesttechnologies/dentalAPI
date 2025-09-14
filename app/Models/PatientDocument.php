<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class PatientDocument
 * 
 * @property string $PatientDocumentID
 * @property string $PatientID
 * @property string $DocumentID
 * @property string|null $PatientTreatmentID
 * 
 * @property Patient $patient
 *
 * @package App\Models
 */
class PatientDocument extends Model
{
	protected $table = 'PatientDocuments';
	protected $primaryKey = 'PatientDocumentID';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'PatientID',
		'DocumentID',
		'PatientTreatmentID'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->PatientDocumentID)) {
				$model->PatientDocumentID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientDocumentID'],
		);
    }

	public function patient()
	{
		return $this->belongsTo(Patient::class, 'PatientID');
	}
}
