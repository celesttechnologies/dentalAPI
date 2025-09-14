<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FeedbackResponseBase
 * 
 * @property int $FeedbackResponseID
 * @property int $FeedbackID
 * @property int $QuestionID
 * @property int $QuestionTypeID
 * @property string|null $ResponseValue
 * @property string|null $ResponseDescription
 * @property string $CreatedBy
 * @property Carbon $CreatedOn
 * @property string|null $UpdatedBy
 * @property Carbon|null $UpdatedOn
 * 
 * @property FeedbackResponse $feedback_response
 *
 * @package App\Models
 */
class FeedbackResponseBase extends Model
{
	protected $table = 'FeedbackResponseBase';
	protected $primaryKey = 'FeedbackResponseID';
	public $timestamps = false;

	protected $casts = [
		'FeedbackID' => 'int',
		'QuestionID' => 'int',
		'QuestionTypeID' => 'int',
		'CreatedOn' => 'datetime',
		'UpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'FeedbackID',
		'QuestionID',
		'QuestionTypeID',
		'ResponseValue',
		'ResponseDescription',
		'CreatedBy',
		'CreatedOn',
		'UpdatedBy',
		'UpdatedOn'
	];

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['FeedbackResponseID'],
		);
    }

	public function feedback_response()
	{
		return $this->belongsTo(FeedbackResponse::class, 'FeedbackID');
	}
}
