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
 * Class ClinicSearchAgent
 * 
 * @property string $SearchAgentID
 * @property string $ClinicID
 * @property string|null $AgentName
 * @property int|null $AgentPurposeID
 * @property string|null $AgentDetails
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 *
 * @package App\Models
 */
class ClinicSearchAgent extends Model
{
	protected $table = 'ClinicSearchAgents';
	protected $primaryKey = 'SearchAgentID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'AgentPurposeID' => 'int',
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicID',
		'AgentName',
		'AgentPurposeID',
		'AgentDetails',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->SearchAgentID)) {
				$model->SearchAgentID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['SearchAgentID'],
		);
    }
}
