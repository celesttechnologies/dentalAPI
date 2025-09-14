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
 * Class PatientTestimonial
 * 
 * @property string $TestimonialID
 * @property string|null $ClinicID
 * @property string|null $PatientID
 * @property string|null $PatientName
 * @property string|null $Title
 * @property string|null $Description
 * @property Carbon|null $DateOfTestimonial
 * @property int|null $DocumentID
 * @property Carbon|null $PublishedFrom
 * @property Carbon|null $PublishedTill
 * @property bool|null $ShowOnTV
 * @property bool|null $IsDelted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 *
 * @package App\Models
 */
class PatientTestimonial extends Model
{
	protected $table = 'PatientTestimonials';
	protected $primaryKey = 'TestimonialID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'DateOfTestimonial' => 'datetime',
		'DocumentID' => 'int',
		'PublishedFrom' => 'datetime',
		'PublishedTill' => 'datetime',
		'ShowOnTV' => 'bool',
		'IsDelted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'PatientID',
		'PatientName',
		'Title',
		'Description',
		'DateOfTestimonial',
		'DocumentID',
		'PublishedFrom',
		'PublishedTill',
		'ShowOnTV',
		'IsDelted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->TestimonialID)) {
				$model->TestimonialID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['TestimonialID'],
		);
    }
}
