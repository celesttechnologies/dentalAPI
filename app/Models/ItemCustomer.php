<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class ItemCustomer
 * 
 * @property string $ItemCustomerID
 * @property string|null $ClinicID
 * @property string|null $CustomerName
 * @property string|null $RegistrationNo
 * @property string|null $ContactPerson
 * @property string|null $Notes
 * @property string|null $Street1
 * @property string|null $Street2
 * @property string|null $City
 * @property string|null $State
 * @property string|null $Country
 * @property string|null $Postcode
 * @property string|null $ISD
 * @property string|null $STD
 * @property string|null $Phone
 * @property string|null $PermanentAddress
 * @property Carbon|null $AddedOn
 * @property string|null $AddedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property Carbon|null $DeletedOn
 * @property string|null $DeletedBy
 * @property bool|null $IsActive
 * @property string|null $rowguid
 * 
 * @property Collection|SalesOrderHeader[] $sales_order_headers
 *
 * @package App\Models
 */
class ItemCustomer extends Model
{
	protected $table = 'ItemCustomers';
	protected $primaryKey = 'ItemCustomerID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'AddedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'DeletedOn' => 'datetime',
		'IsActive' => 'bool'
	];

	protected $fillable = [
		'ClinicID',
		'CustomerName',
		'RegistrationNo',
		'ContactPerson',
		'Notes',
		'Street1',
		'Street2',
		'City',
		'State',
		'Country',
		'Postcode',
		'ISD',
		'STD',
		'Phone',
		'PermanentAddress',
		'AddedOn',
		'AddedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'DeletedOn',
		'DeletedBy',
		'IsActive',
		'rowguid'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ItemCustomerID)) {
				$model->ItemCustomerID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ItemCustomerID'],
		);
    }

	public function sales_order_headers()
	{
		return $this->hasMany(SalesOrderHeader::class, 'ItemCustomerID');
	}
}
