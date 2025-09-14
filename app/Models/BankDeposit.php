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
 * Class BankDeposit
 * 
 * @property string $BankDepositID
 * @property Carbon|null $Date
 * @property string $BankAccountID
 * @property float|null $Amount
 * @property string|null $Comments
 * @property string|null $TransactionID
 * @property string|null $LastUpdatedBy
 * @property Carbon $LastUpdatedOn
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property bool $IsDeleted
 * @property string|null $rowguid
 * 
 * @property BankAccount $bank_account
 *
 * @package App\Models
 */
class BankDeposit extends Model
{
	protected $table = 'BankDeposits';
	protected $primaryKey = 'BankDepositID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Date' => 'datetime',
		'Amount' => 'float',
		'LastUpdatedOn' => 'datetime',
		'CreatedOn' => 'datetime',
		'IsDeleted' => 'bool'
	];

	protected $fillable = [
		'Date',
		'BankAccountID',
		'Amount',
		'Comments',
		'TransactionID',
		'LastUpdatedBy',
		'LastUpdatedOn',
		'CreatedOn',
		'CreatedBy',
		'IsDeleted',
		'rowguid'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->BankDepositID)) {
				$model->BankDepositID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['BankDepsositID'],
		);
    }

	public function bank_account()
	{
		return $this->belongsTo(BankAccount::class, 'BankAccountID');
	}
}
