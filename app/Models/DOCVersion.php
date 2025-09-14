<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DOCVersion
 * 
 * @property int $ID
 * @property int|null $DocumentID
 * @property int|null $VersionNumber
 * @property int|null $CategoryID
 * @property int|null $SubCategoryID
 * @property int|null $StatusID
 * @property string|null $PatientID
 * @property string|null $DocumentType
 * @property string|null $Description
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property Carbon|null $PublishOn
 * @property Carbon|null $ExpirationOn
 * @property int|null $RelatedVersionID
 * @property int|null $RelatedVersionNumber
 * @property bool|null $IsDeleted
 * @property bool|null $IsExpired
 * @property string|null $FileName
 * @property string|null $UploadedFilePath
 * @property string|null $PhysicalFilePath
 * @property int|null $RefId1
 *
 * @package App\Models
 */
class DOCVersion extends Model
{
	protected $table = 'DOC_Version';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'DocumentID' => 'int',
		'VersionNumber' => 'int',
		'CategoryID' => 'int',
		'SubCategoryID' => 'int',
		'StatusID' => 'int',
		'LastUpdatedOn' => 'datetime',
		'PublishOn' => 'datetime',
		'ExpirationOn' => 'datetime',
		'RelatedVersionID' => 'int',
		'RelatedVersionNumber' => 'int',
		'IsDeleted' => 'bool',
		'IsExpired' => 'bool',
		'RefId1' => 'int'
	];

	protected $fillable = [
		'DocumentID',
		'VersionNumber',
		'CategoryID',
		'SubCategoryID',
		'StatusID',
		'PatientID',
		'DocumentType',
		'Description',
		'CreatedBy',
		'LastUpdatedOn',
		'PublishOn',
		'ExpirationOn',
		'RelatedVersionID',
		'RelatedVersionNumber',
		'IsDeleted',
		'IsExpired',
		'FileName',
		'UploadedFilePath',
		'PhysicalFilePath',
		'RefId1'
	];

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ID'],
		);
    }
}
