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
 * Class ClinicTVNewsTicker
 * 
 * @property string $NewsTickerID
 * @property string|null $ClinicID
 * @property string|null $Title
 * @property string|null $NewsTickerText
 * @property Carbon|null $PublishedFrom
 * @property Carbon|null $PublishedTo
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * 
 * @property Clinic|null $clinic
 *
 * @package App\Models
 */
class ClinicTVNewsTicker extends Model
{
	protected $table = 'Clinic_TV_NewsTicker';
	protected $primaryKey = 'NewsTickerID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'PublishedFrom' => 'datetime',
		'PublishedTo' => 'datetime',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'Title',
		'NewsTickerText',
		'PublishedFrom',
		'PublishedTo',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->NewsTickerID)) {
				$model->NewsTickerID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['NewsTickerID'],
		);
    }

	public function clinic()
	{
		return $this->belongsTo(Clinic::class, 'ClinicID');
	}
}
