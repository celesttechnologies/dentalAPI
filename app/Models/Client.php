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
 * Class Client
 * 
 * @property string $ClientID
 * @property string|null $ClientName
 * @property string|null $Address1
 * @property string|null $City
 * @property string|null $State
 * @property int|null $CountryID
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property string|null $Address2
 * @property string|null $Description
 * @property string|null $Email
 * @property string|null $Fax
 * @property string|null $FinalDescription
 * @property bool|null $IsDeleted
 * @property string|null $LastUpdatedBy
 * @property string|null $LastUpdatedOn
 * @property int|null $NoOfClinics
 * @property string|null $Phone
 * @property float|null $Revenue
 * @property string|null $rowguid
 *
 * @package App\Models
 */
class Client extends Model
{
	protected $table = 'Clients';
	protected $primaryKey = 'ClientID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'CountryID' => 'int',
		'CreatedOn' => 'datetime',
		'IsDeleted' => 'bool',
		'NoOfClinics' => 'int',
		'Revenue' => 'float'
	];

	protected $fillable = [
		'ClientName',
		'Address1',
		'City',
		'State',
		'CountryID',
		'CreatedOn',
		'CreatedBy',
		'Address2',
		'Description',
		'Email',
		'Fax',
		'FinalDescription',
		'IsDeleted',
		'LastUpdatedBy',
		'LastUpdatedOn',
		'NoOfClinics',
		'Phone',
		'Revenue',
		'rowguid'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ClientID)) {
				$model->ClientID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ClientID'],
		);
    }
}
