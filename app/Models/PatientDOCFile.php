<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PatientDOCFile
 * 
 * @property int $ID
 * @property string $PatientID
 * @property string|null $ClinicID
 * @property int|null $DocumentID
 * @property int|null $VersionNumber
 * @property int|null $RelatedVersionID
 * @property int|null $RelatedVersionNumber
 * @property int|null $FolderId
 * @property int|null $StatusID
 * @property string|null $Description
 * @property string|null $FileName
 * @property string|null $VirtualFilePath
 * @property string|null $PhysicalFilePath
 * @property string|null $CreatedBy
 * @property Carbon|null $CreatedOn
 * @property string|null $LastUpdatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property bool|null $IsDeleted
 * @property Carbon|null $PublishOn
 * @property Carbon|null $ExpirationOn
 * @property string|null $RefId
 * @property int|null $RefId1
 * @property string|null $FileSize
 * @property string|null $FileType
 * @property string|null $UploadedFileName
 * @property string|null $FileThumbImage
 * @property string $ReferenceNo
 * @property string|null $rowguid
 *
 * @package App\Models
 */
class PatientDOCFile extends Model
{
	protected $table = 'PatientDOC_Files';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'DocumentID' => 'int',
		'VersionNumber' => 'int',
		'RelatedVersionID' => 'int',
		'RelatedVersionNumber' => 'int',
		'FolderId' => 'int',
		'StatusID' => 'int',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'IsDeleted' => 'bool',
		'PublishOn' => 'datetime',
		'ExpirationOn' => 'datetime',
		'RefId1' => 'int'
	];

	protected $fillable = [
		'PatientID',
		'ClinicID',
		'DocumentID',
		'VersionNumber',
		'RelatedVersionID',
		'RelatedVersionNumber',
		'FolderId',
		'StatusID',
		'Description',
		'FileName',
		'VirtualFilePath',
		'PhysicalFilePath',
		'CreatedBy',
		'CreatedOn',
		'LastUpdatedBy',
		'LastUpdatedOn',
		'IsDeleted',
		'PublishOn',
		'ExpirationOn',
		'RefId',
		'RefId1',
		'FileSize',
		'FileType',
		'UploadedFileName',
		'FileThumbImage',
		'ReferenceNo',
		'rowguid'
	];

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ID'],
		);
    }
}
