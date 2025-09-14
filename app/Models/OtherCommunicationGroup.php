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
 * Class OtherCommunicationGroup
 * 
 * @property string $OtherCommunicationGroup
 * @property string|null $CommunicationGroupMasterID
 * @property string|null $FirstName
 * @property string|null $LastName
 * @property string|null $MobileNumber
 * @property string|null $EmailID
 * @property string|null $GroupType
 * @property bool|null $IsDeleted
 * @property string|null $CreatedBy
 * @property Carbon|null $CreatedOn
 * @property string|null $LastUpdatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property int|null $GroupSource
 * @property string|null $GroupSourceDesc
 * @property string|null $CountryDialCode
 *
 * @package App\Models
 */
class OtherCommunicationGroup extends Model
{
	protected $table = 'OtherCommunicationGroup';
	protected $primaryKey = 'OtherCommunicationGroup';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'GroupSource' => 'int'
	];

	protected $fillable = [
		'CommunicationGroupMasterID',
		'FirstName',
		'LastName',
		'MobileNumber',
		'EmailID',
		'GroupType',
		'IsDeleted',
		'CreatedBy',
		'CreatedOn',
		'LastUpdatedBy',
		'LastUpdatedOn',
		'GroupSource',
		'GroupSourceDesc',
		'CountryDialCode'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->OtherCommunicationGroup)) {
				$model->OtherCommunicationGroup = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['OtherCommunicationGroup'],
		);
    }
}
