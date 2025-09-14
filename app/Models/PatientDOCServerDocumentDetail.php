<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PatientDOCServerDocumentDetail
 * 
 * @property int $Id
 * @property string|null $ClinicID
 * @property int|null $PartitionID
 * @property string|null $Title
 * @property string|null $Description
 * @property string|null $FolderPath
 * @property string|null $AbsolutePath
 * @property int|null $IsDeleted
 * @property string|null $CreatedBy
 * @property Carbon $CreatedOn
 * @property string|null $Owner
 * @property string|null $LastUpdatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string $RowGuid
 *
 * @package App\Models
 */
class PatientDOCServerDocumentDetail extends Model
{
	protected $table = 'PatientDOC_ServerDocumentDetails';
	protected $primaryKey = 'Id';
	public $timestamps = false;

	protected $casts = [
		'PartitionID' => 'int',
		'IsDeleted' => 'int',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'PartitionID',
		'Title',
		'Description',
		'FolderPath',
		'AbsolutePath',
		'IsDeleted',
		'CreatedBy',
		'CreatedOn',
		'Owner',
		'LastUpdatedBy',
		'LastUpdatedOn',
		'RowGuid'
	];

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['Id'],
		);
    }
}
