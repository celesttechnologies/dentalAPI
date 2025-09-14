<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class ExpensesInOutHeader
 * 
 * @property string $ExpensesHeaderID
 * @property string|null $ClinicID
 * @property string $ExpenseCategory
 * @property int $NoOfExpenseItems
 * @property float $TotalAmount
 * @property Carbon $ExpenseDate
 * @property string $CreatedBy
 * @property Carbon $CreatedOn
 * @property string $LastUpdatedBy
 * @property Carbon $LastUpdatedOn
 * @property string $Comments
 * @property bool $IsDeleted
 * @property string $rowguid
 * 
 * @property Collection|ExpensesInOutDetail[] $expenses_in_out_details
 *
 * @package App\Models
 */
class ExpensesInOutHeader extends Model
{
	protected $table = 'ExpensesInOutHeader';
	protected $primaryKey = 'ExpensesHeaderID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'NoOfExpenseItems' => 'int',
		'TotalAmount' => 'float',
		'ExpenseDate' => 'datetime',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime',
		'IsDeleted' => 'bool'
	];

	protected $fillable = [
		'ClinicID',
		'ExpenseCategory',
		'NoOfExpenseItems',
		'TotalAmount',
		'ExpenseDate',
		'CreatedBy',
		'CreatedOn',
		'LastUpdatedBy',
		'LastUpdatedOn',
		'Comments',
		'IsDeleted',
		'rowguid'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ExpensesHeaderID)) {
				$model->ExpensesHeaderID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ExpensesHeaderID'],
		);
    }

	public function expenses_in_out_details()
	{
		return $this->hasMany(ExpensesInOutDetail::class, 'ExpensesHeaderID');
	}
}
