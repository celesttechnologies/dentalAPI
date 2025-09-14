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
 * Class EmailSituation
 * 
 * @property string $EmailSituationID
 * @property string|null $SitutationCode
 * @property string|null $SituationDescription
 * @property string|null $DetailedTrigerringDeescription
 * @property string|null $SituationType
 * @property string|null $DependentField1
 * @property string|null $DependentField2
 * @property string|null $DependentField3
 * @property string|null $DependentField4
 * @property string|null $IsActive
 * @property bool|null $isDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 *
 * @package App\Models
 */
class EmailSituation extends Model
{
	protected $table = 'EmailSituations';
	protected $primaryKey = 'EmailSituationID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'isDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'SitutationCode',
		'SituationDescription',
		'DetailedTrigerringDeescription',
		'SituationType',
		'DependentField1',
		'DependentField2',
		'DependentField3',
		'DependentField4',
		'IsActive',
		'isDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->EmailSituationID)) {
				$model->EmailSituationID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['EmailSituationID'],
		);
    }
}
