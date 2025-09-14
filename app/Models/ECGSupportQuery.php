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
 * Class ECGSupportQuery
 * 
 * @property string $QueryID
 * @property string|null $Name
 * @property string|null $EmailId
 * @property string|null $ContactNo
 * @property string|null $Query
 * @property string|null $ClinicID
 * @property Carbon|null $QueryDate
 * @property string|null $City
 * @property string|null $IPAddress
 *
 * @package App\Models
 */
class ECGSupportQuery extends Model
{
	protected $table = 'ECG_SupportQueries';
	protected $primaryKey = 'QueryID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'QueryDate' => 'datetime'
	];

	protected $fillable = [
		'Name',
		'EmailId',
		'ContactNo',
		'Query',
		'ClinicID',
		'QueryDate',
		'City',
		'IPAddress'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->QueryID)) {
				$model->QueryID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['QueryID'],
		);
    }
}
