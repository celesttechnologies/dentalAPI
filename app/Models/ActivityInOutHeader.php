<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ActivityInOutHeader
 * 
 * @property int $ActivityHeaderId
 * @property string $ClinicID
 * @property int $ActivityNumber
 * @property int $NoOfItems
 * @property int $Quantity
 * @property float $Amount
 * @property string $ActivityType
 * @property Carbon $ActivityDate
 * @property string $CreatedBy
 * @property Carbon $CreatedOn
 * @property string $LastUpdatedBy
 * @property Carbon $LastUpdatedOn
 * @property string $Comments
 * @property bool $IsDeleted
 * @property string $rowguid
 * @property string|null $PurchaseOrderHeaderId
 *
 * @package App\Models
 */
class ActivityInOutHeader extends Model
{
	protected $table = 'ActivityInOutHeader';
	public $timestamps = false;

	protected $casts = [
		'ActivityNumber' => 'int',
		'NoOfItems' => 'int',
		'Quantity' => 'int',
		'Amount' => 'float',
		'ActivityDate' => 'datetime',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'IsDeleted' => 'bool'
	];

	protected $fillable = [
		'ActivityHeaderId',
		'ClinicID',
		'ActivityNumber',
		'NoOfItems',
		'Quantity',
		'Amount',
		'ActivityType',
		'ActivityDate',
		'CreatedBy',
		'CreatedOn',
		'LastUpdatedBy',
		'LastUpdatedOn',
		'Comments',
		'IsDeleted',
		'rowguid',
		'PurchaseOrderHeaderId'
	];
}
