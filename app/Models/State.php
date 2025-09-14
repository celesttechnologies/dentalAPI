<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class State
 * 
 * @property int $StateID
 * @property int $CountryID
 * @property string $StateCode
 * @property string $StateDesc
 *
 * @package App\Models
 */
class State extends Model
{
	protected $table = 'State';
	protected $primaryKey = 'StateID';
	public $timestamps = false;

	protected $casts = [
		'CountryID' => 'int'
	];

	protected $fillable = [
		'CountryID',
		'StateCode',
		'StateDesc'
	];
}
