<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AspnetUsersInRole
 * 
 * @property string $UserId
 * @property string $RoleId
 * 
 * @property AspnetRole $aspnet_role
 * @property AspnetUser $aspnet_user
 *
 * @package App\Models
 */
class AspnetUsersInRole extends Model
{
	protected $table = 'aspnet_UsersInRoles';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'UserId',
		'RoleId'
	];

	public function aspnet_role()
	{
		return $this->belongsTo(AspnetRole::class, 'RoleId');
	}

	public function aspnet_user()
	{
		return $this->belongsTo(AspnetUser::class, 'UserId');
	}
}
