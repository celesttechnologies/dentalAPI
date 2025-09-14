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
 * Class PatientLabWork
 * 
 * @property string $PatientLabWorkID
 * @property string $PatientLabID
 * @property string|null $WorkPatternDR
 * @property string|null $WorkPatternTec
 * @property Carbon|null $WorkPatternDate
 * @property Carbon|null $WorkPatternTime
 * @property string|null $MetalWorkDR
 * @property string|null $MetalWorkTec
 * @property Carbon|null $MetalWorkDate
 * @property Carbon|null $MetalWorkTime
 * @property string|null $CeramicsDR
 * @property string|null $CeramicsTec
 * @property Carbon|null $CeramicsDate
 * @property Carbon|null $CeramicsTime
 * @property string|null $DentureDR
 * @property string|null $DentureTec
 * @property Carbon|null $DentureDate
 * @property Carbon|null $DentureTime
 * 
 * @property PatientLab $patient_lab
 *
 * @package App\Models
 */
class PatientLabWork extends Model
{
	protected $table = 'PatientLabWork';
	protected $primaryKey = 'PatientLabWorkID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'WorkPatternDate' => 'datetime',
		'WorkPatternTime' => 'datetime',
		'MetalWorkDate' => 'datetime',
		'MetalWorkTime' => 'datetime',
		'CeramicsDate' => 'datetime',
		'CeramicsTime' => 'datetime',
		'DentureDate' => 'datetime',
		'DentureTime' => 'datetime'
	];

	protected $fillable = [
		'PatientLabID',
		'WorkPatternDR',
		'WorkPatternTec',
		'WorkPatternDate',
		'WorkPatternTime',
		'MetalWorkDR',
		'MetalWorkTec',
		'MetalWorkDate',
		'MetalWorkTime',
		'CeramicsDR',
		'CeramicsTec',
		'CeramicsDate',
		'CeramicsTime',
		'DentureDR',
		'DentureTec',
		'DentureDate',
		'DentureTime'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->PatientLabWorkID)) {
				$model->PatientLabWorkID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PatientLabWorkID'],
		);
    }

	public function patient_lab()
	{
		return $this->belongsTo(PatientLab::class, 'PatientLabID');
	}
}
