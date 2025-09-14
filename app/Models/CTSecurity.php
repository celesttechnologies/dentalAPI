<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CTSecurity
 * 
 * @property int $SecurityID
 * @property string|null $ObjectType
 * @property int|null $ObjectID
 * @property string|null $ObjectDetails
 * @property string|null $UserObjectID
 * @property string|null $UserObjectType
 * @property bool|null $FullControl
 * @property bool|null $Write
 * @property bool|null $Modify
 * @property bool|null $ReadExecute
 * @property bool|null $ListContent
 * @property bool|null $ReadOnly
 * @property bool|null $SpecialPermissions
 * @property string|null $CreatedBy
 * @property Carbon $CreatedOn
 * @property string|null $LastUpdatedBy
 * @property Carbon $LastUpdatedOn
 *
 * @package App\Models
 */
class CTSecurity extends Model
{
	protected $table = 'CT_Securities';
	protected $primaryKey = 'SecurityID';
	public $timestamps = false;

	protected $casts = [
		'ObjectID' => 'int',
		'FullControl' => 'bool',
		'Write' => 'bool',
		'Modify' => 'bool',
		'ReadExecute' => 'bool',
		'ListContent' => 'bool',
		'ReadOnly' => 'bool',
		'SpecialPermissions' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ObjectType',
		'ObjectID',
		'ObjectDetails',
		'UserObjectID',
		'UserObjectType',
		'FullControl',
		'Write',
		'Modify',
		'ReadExecute',
		'ListContent',
		'ReadOnly',
		'SpecialPermissions',
		'CreatedBy',
		'CreatedOn',
		'LastUpdatedBy',
		'LastUpdatedOn'
	];

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['SecurityID'],
		);
    }
}
