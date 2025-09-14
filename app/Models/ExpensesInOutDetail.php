<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class ExpensesInOutDetail
 * 
 * @property string $ExpensesDetailID
 * @property string|null $ExpensesHeaderID
 * @property string $ExpensesTypeID
 * @property string|null $OtherExpenses
 * @property float $Amount
 * @property string|null $PaidBy
 * 
 * @property ExpensesInOutHeader|null $expenses_in_out_header
 *
 * @package App\Models
 */
class ExpensesInOutDetail extends Model
{
	protected $table = 'ExpensesInOutDetail';
	protected $primaryKey = 'ExpensesDetailID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Amount' => 'float'
	];

	protected $fillable = [
		'ExpensesHeaderID',
		'ExpensesTypeID',
		'OtherExpenses',
		'Amount',
		'PaidBy'
	];

	public function expenses_in_out_header()
	{
		return $this->belongsTo(ExpensesInOutHeader::class, 'ExpensesHeaderID');
	}

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ExpensesDetailID)) {
				$model->ExpensesDetailID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ExpensesDetailID'],
		);
    }
}
