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
 * Class BankAccount
 * 
 * @property string $BankAccountID
 * @property string|null $ClinicID
 * @property string|null $BankAccountName
 * @property string|null $AccountNumber
 * @property string|null $Branch
 * @property string|null $City
 * @property bool|null $IsDeleted
 * @property Carbon $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property string|null $rowguid
 * 
 * @property Collection|BankDeposit[] $bank_deposits
 *
 * @package App\Models
 */
class BankAccount extends Model
{
	protected $table = 'BankAccounts';
	protected $primaryKey = 'BankAccountID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'BankAccountName',
		'AccountNumber',
		'Branch',
		'City',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'rowguid'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->BankAccountID)) {
				$model->BankAccountID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['BankAccountID'],
		);
    }

	public function bank_deposits()
	{
		return $this->hasMany(BankDeposit::class, 'BankAccountID');
	}
}
