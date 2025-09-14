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
 * Class PrescriptionTemplateMaster
 * 
 * @property string $PrescriptionTemplateMasterID
 * @property string|null $PrescriptionTemplateName
 * @property string|null $PrescriptionTemplateDesc
 * @property string|null $PrescriptionNote
 * @property string|null $ClinicID
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 *
 * @package App\Models
 */
class PrescriptionTemplateMaster extends Model
{
	protected $table = 'PrescriptionTemplateMaster';
	protected $primaryKey = 'PrescriptionTemplateMasterID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'PrescriptionTemplateMasterID',
		'PrescriptionTemplateName',
		'PrescriptionTemplateDesc',
		'PrescriptionNote',
		'ClinicID',
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
			if (empty($model->PrescriptionTemplateMasterID)) {
				$model->PrescriptionTemplateMasterID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['PrescriptionTemplateMasterID'],
		);
    }
}
