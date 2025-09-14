<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FeedbackResponse
 * 
 * @property int $FeedbackID
 * @property string $ClinicID
 * @property string|null $PatientID
 * @property string|null $ProviderID
 * @property string|null $PatientName
 * @property string|null $MobileNumber
 * @property Carbon $DateOfFeedBack
 * @property string $IsDeleted
 * @property string $CreatedBy
 * @property Carbon $CreatedOn
 * @property string|null $UpdatedBy
 * @property Carbon|null $UpdatedOn
 * @property int $Status
 * 
 * @property Collection|FeedbackResponseBase[] $feedback_response_bases
 *
 * @package App\Models
 */
class FeedbackResponse extends Model
{
	protected $table = 'FeedbackResponse';
	protected $primaryKey = 'FeedbackID';
	public $timestamps = false;

	protected $casts = [
		'DateOfFeedBack' => 'datetime',
		'CreatedOn' => 'datetime',
		'UpdatedOn' => 'datetime',
		'Status' => 'int'
	];

	protected $fillable = [
		'ClinicID',
		'PatientID',
		'ProviderID',
		'PatientName',
		'MobileNumber',
		'DateOfFeedBack',
		'IsDeleted',
		'CreatedBy',
		'CreatedOn',
		'UpdatedBy',
		'UpdatedOn',
		'Status'
	];

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new \App\Scopes\DoctorScope);
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['FeedbackID'],
		);
    }

	public function feedback_response_bases()
	{
		return $this->hasMany(FeedbackResponseBase::class, 'FeedbackID');
	}
}
