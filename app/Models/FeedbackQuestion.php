<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FeedbackQuestion
 * 
 * @property int $Id
 * @property string $Question
 * @property int $QuestionType
 * @property string $QuestionTypeDescription
 * @property string $CreatedBy
 * @property Carbon $CreatedDate
 * @property string $UpdatedBy
 * @property Carbon $UpdatedDate
 * @property string $IsDeleted
 *
 * @package App\Models
 */
class FeedbackQuestion extends Model
{
	protected $table = 'FeedbackQuestions';
	protected $primaryKey = 'Id';
	public $timestamps = false;

	protected $casts = [
		'QuestionType' => 'int',
		'CreatedDate' => 'datetime',
		'UpdatedDate' => 'datetime'
	];

	protected $fillable = [
		'Question',
		'QuestionType',
		'QuestionTypeDescription',
		'CreatedBy',
		'CreatedDate',
		'UpdatedBy',
		'UpdatedDate',
		'IsDeleted'
	];

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['Id'],
		);
    }
}
