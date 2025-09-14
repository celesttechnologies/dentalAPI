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
 * Class Family
 * 
 * @property string $FamilyID
 * @property string|null $ClinicID
 * @property string|null $FamilyName
 * @property string|null $FamilyNotes
 * @property string|null $AddressLine1
 * @property string|null $AddressLine2
 * @property string|null $Street
 * @property string|null $Area
 * @property string|null $City
 * @property string|null $State
 * @property int|null $Country
 * @property string|null $ZipCode
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property string|null $rowguid
 * @property int $FamilyNo
 * @property string $FamilyCode
 *
 * @package App\Models
 */
class Family extends Model
{
	protected $table = 'Family';
	protected $primaryKey = 'FamilyID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Country' => 'int',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'FamilyNo' => 'int'
	];

	protected $fillable = [
		'ClinicID',
		'FamilyName',
		'FamilyNotes',
		'AddressLine1',
		'AddressLine2',
		'Street',
		'Area',
		'City',
		'State',
		'Country',
		'ZipCode',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'rowguid',
		'FamilyNo',
		'FamilyCode'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->FamilyID)) {
				$model->FamilyID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['FamilyID'],
		);
    }
}
