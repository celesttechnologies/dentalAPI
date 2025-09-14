<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class ClientClinic
 * 
 * @property string $ClientClinicID
 * @property string|null $ClientID
 * @property string|null $ClinicID
 *
 * @package App\Models
 */
class ClientClinic extends Model
{
	protected $table = 'ClientClinics';
	protected $primaryKey = 'ClientClinicID';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'ClientID',
		'ClinicID'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->ClientClinicID)) {
				$model->ClientClinicID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['ClientClinicID'],
		);
    }
}
