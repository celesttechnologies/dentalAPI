<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


/**
 * Class User
 * 
 * @property string $UserID
 * @property string|null $RoleID
 * @property string|null $ClientID
 * @property string|null $UserName
 * @property string|null $Password
 * @property string|null $Email
 * @property string|null $Name
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property string|null $Mobile
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable, HasRoles;

	protected $table = 'Users';
	protected $primaryKey = 'UserID';
	public $incrementing = false; // Disable auto-incrementing
	protected $keyType = 'string'; // Set key type to string (UUID)

	protected $casts = [
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'RoleID',
		'ClientID',
		'UserName',
		'Password',
		'Email',
		'Name',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'Mobile'
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'Password',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy',
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->UserID)) {
				$model->UserID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	/**
	 * Get the attributes that should be cast.
	 *
	 * @return array<string, string>
	 */
	protected function casts(): array
	{
		return [
			'Password' => 'hashed',
		];
	}

	public function getAuthPassword()
	{
		return $this->Password;
	}
}
