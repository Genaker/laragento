<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminPassword
 * 
 * @property int $password_id
 * @property int $user_id
 * @property string|null $password_hash
 * @property int $expires
 * @property int $last_updated
 * 
 * @property AdminUser $admin_user
 *
 * @package Laragento\Models
 */
class AdminPassword extends Model
{
	protected $table = 'admin_passwords';
	protected $primaryKey = 'password_id';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'expires' => 'int',
		'last_updated' => 'int'
	];

	protected $fillable = [
		'user_id',
		'password_hash',
		'expires',
		'last_updated'
	];

	public function admin_user()
	{
		return $this->belongsTo(AdminUser::class, 'user_id');
	}
}
