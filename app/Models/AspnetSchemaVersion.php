<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AspnetSchemaVersion
 * 
 * @property string $Feature
 * @property string $CompatibleSchemaVersion
 * @property bool $IsCurrentVersion
 *
 * @package App\Models
 */
class AspnetSchemaVersion extends Model
{
	protected $table = 'aspnet_SchemaVersions';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsCurrentVersion' => 'bool'
	];

	protected $fillable = [
		'Feature',
		'CompatibleSchemaVersion',
		'IsCurrentVersion'
	];
}
