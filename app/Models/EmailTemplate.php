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
 * Class EmailTemplate
 * 
 * @property string $EmailTemplateID
 * @property string|null $ClinicID
 * @property string|null $SituationID
 * @property int|null $EmailCategoryID
 * @property string|null $FromEmailID
 * @property string|null $BCCEmailID
 * @property string|null $SubjectEnglish
 * @property string|null $BodyEnglish
 * @property Carbon|null $EffectiveDate
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 *
 * @package App\Models
 */
class EmailTemplate extends Model
{
	protected $table = 'EmailTemplates';
	protected $primaryKey = 'EmailTemplateID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'EmailCategoryID' => 'int',
		'EffectiveDate' => 'datetime',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'SituationID',
		'EmailCategoryID',
		'FromEmailID',
		'BCCEmailID',
		'SubjectEnglish',
		'BodyEnglish',
		'EffectiveDate',
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
			if (empty($model->EmailTemplateID)) {
				$model->EmailTemplateID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['EmailTemplateID'],
		);
    }
}
