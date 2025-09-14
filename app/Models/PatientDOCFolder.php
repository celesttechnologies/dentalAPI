<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PatientDOCFolder
 * 
 * @property int $FolderId
 * @property string|null $ClinicID
 * @property string $Title
 * @property string|null $Description
 * @property int|null $ParentFolderId
 * @property int|null $FolderTypeId
 * @property bool $IsDeleted
 * @property string|null $CreatedBy
 * @property Carbon $CreatedOn
 * @property string|null $LastUpdatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $FolderPath
 * @property int|null $PartitionId
 * @property string|null $RowGuid
 * @property string|null $FolderType
 * @property string $Owner
 *
 * @package App\Models
 */
class PatientDOCFolder extends Model
{
	protected $table = 'PatientDOC_Folders';
	protected $primaryKey = 'FolderId';
	public $timestamps = false;

	protected $casts = [
		'ParentFolderId' => 'int',
		'FolderTypeId' => 'int',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'PartitionId' => 'int'
	];

	protected $fillable = [
		'ClinicID',
		'Title',
		'Description',
		'ParentFolderId',
		'FolderTypeId',
		'IsDeleted',
		'CreatedBy',
		'CreatedOn',
		'LastUpdatedBy',
		'LastUpdatedOn',
		'FolderPath',
		'PartitionId',
		'RowGuid',
		'FolderType',
		'Owner'
	];

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['FolderId'],
		);
    }
}
