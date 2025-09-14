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
 * Class PrescriptionTemplate
 * 
 * @property string $PrescriptionTemplateID
 * @property string $ClinicId
 * @property string|null $TemplateName
 * @property string|null $MedicineId
 * @property string|null $MedicineName
 * @property int|null $FrequencyId
 * @property string|null $Dosage
 * @property string|null $Duration
 * @property string|null $DrugNote
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property string|null $PrescriptionTemplateMasterID
 * @property string|null $Frequency
 * @property int|null $SequenceOrder
 *
 * @package App\Models
 */
class PrescriptionTemplate extends Model
{
	protected $table = 'PrescriptionTemplate';
	protected $primaryKey = 'PrescriptionTemplateID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'FrequencyId' => 'int',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'SequenceOrder' => 'int'
	];

	protected $fillable = [
		'ClinicId',
		'TemplateName',
		'MedicineId',
		'MedicineName',
		'FrequencyId',
		'Dosage',
		'Duration',
		'DrugNote',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'PrescriptionTemplateMasterID',
		'Frequency',
		'SequenceOrder'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->PrescriptionTemplateID)) {
				$model->PrescriptionTemplateID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PrescriptionTemplateID'],
		);
    }
}
