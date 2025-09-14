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
 * Class ClinicLabSupplier
 * 
 * @property string $LabSupplierID
 * @property string $ClinicID
 * @property string|null $SupplierName
 * @property string|null $RegistrationNo
 * @property string|null $ContactPerson
 * @property string|null $EmailAddress1
 * @property string|null $EmailAddress2
 * @property string|null $Notes
 * @property string|null $Address1
 * @property string|null $Address2
 * @property bool|null $IsEmailLabOrderActive
 * @property bool|null $IsActive
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property string|null $rowguid
 * 
 * @property Clinic $clinic
 *
 * @package App\Models
 */
class ClinicLabSupplier extends Model
{
	protected $table = 'ClinicLabSupplier';
	protected $primaryKey = 'LabSupplierID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsEmailLabOrderActive' => 'bool',
		'IsActive' => 'bool',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'SupplierName',
		'RegistrationNo',
		'ContactPerson',
		'EmailAddress1',
		'EmailAddress2',
		'Notes',
		'Address1',
		'Address2',
		'IsEmailLabOrderActive',
		'IsActive',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'rowguid'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->LabSupplierID)) {
				$model->LabSupplierID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['LabSupplierID'],
		);
    }

	public function clinic()
	{
		return $this->belongsTo(Clinic::class, 'ClinicID');
	}
}
