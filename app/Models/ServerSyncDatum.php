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
 * Class ServerSyncDatum
 * 
 * @property string $ServerSyncPrimaryID
 * @property string|null $ClinicID
 * @property string|null $TableName
 * @property string|null $PrimaryKeyColumnName
 * @property string|null $PrimaryKeyID
 * @property string|null $rowguid
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property bool|null $IsCreatedExported
 * @property Carbon|null $IsCreatedExportedOn
 * @property bool|null $IsLastUpdatedExported
 * @property Carbon|null $IsLastUpdatedExportedOn
 * @property string|null $RowData
 *
 * @package App\Models
 */
class ServerSyncDatum extends Model
{
	protected $table = 'ServerSyncData';
	protected $primaryKey = 'ServerSyncPrimaryID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'IsCreatedExported' => 'bool',
		'IsCreatedExportedOn' => 'datetime',
		'IsLastUpdatedExported' => 'bool',
		'IsLastUpdatedExportedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'TableName',
		'PrimaryKeyColumnName',
		'PrimaryKeyID',
		'rowguid',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'IsCreatedExported',
		'IsCreatedExportedOn',
		'IsLastUpdatedExported',
		'IsLastUpdatedExportedOn',
		'RowData'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ServerSyncPrimaryID)) {
				$model->ServerSyncPrimaryID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ServerSyncPrimaryID'],
		);
    }
}
