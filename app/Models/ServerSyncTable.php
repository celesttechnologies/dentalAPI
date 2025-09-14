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
 * Class ServerSyncTable
 * 
 * @property string $ServerTableSyncID
 * @property string|null $TableName
 * @property string|null $PrimaryKey
 * @property bool|null $IsTobeSync
 * @property int|null $SyncOrder
 * @property bool|null $IsDeleted
 * @property Carbon|null $LastSyncTime
 * @property string|null $LastStatusMessage
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property string|null $ClinicID
 *
 * @package App\Models
 */
class ServerSyncTable extends Model
{
	protected $table = 'ServerSyncTables';
	protected $primaryKey = 'ServerTableSyncID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsTobeSync' => 'bool',
		'SyncOrder' => 'int',
		'IsDeleted' => 'bool',
		'LastSyncTime' => 'datetime',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'TableName',
		'PrimaryKey',
		'IsTobeSync',
		'SyncOrder',
		'IsDeleted',
		'LastSyncTime',
		'LastStatusMessage',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'ClinicID'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ServerTableSyncID)) {
				$model->ServerTableSyncID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ServerTableSyncID'],
		);
    }
}
