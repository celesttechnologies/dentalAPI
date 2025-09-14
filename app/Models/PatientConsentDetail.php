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
 * Class PatientConsentDetail
 * 
 * @property string $ConsentID
 * @property string $PatientID
 * @property string $ProviderID
 * @property int|null $ConsentTypeID
 * @property Carbon $ConsentDate
 * @property string|null $CPName
 * @property string|null $CPRelation
 * @property string|null $CPContact
 * @property float|null $Advance
 * @property float|null $Total
 * @property string|null $Installment
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property string|null $rowguid
 * @property int|null $ProcedureTypeID
 * @property string|null $ProcedureName
 *
 * @package App\Models
 */
class PatientConsentDetail extends Model
{
	protected $table = 'PatientConsentDetails';
	protected $primaryKey = 'ConsentID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ConsentTypeID' => 'int',
		'ConsentDate' => 'datetime',
		'Advance' => 'float',
		'Total' => 'float',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'ProcedureTypeID' => 'int'
	];

	protected $fillable = [
		'PatientID',
		'ProviderID',
		'ConsentTypeID',
		'ConsentDate',
		'CPName',
		'CPRelation',
		'CPContact',
		'Advance',
		'Total',
		'Installment',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'rowguid',
		'ProcedureTypeID',
		'ProcedureName'
	];

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new \App\Scopes\DoctorScope);
		static::creating(function ($model) {
			if (empty($model->ConsentID)) {
				$model->ConsentID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ConsentID'],
		);
    }
}
