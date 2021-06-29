<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminUserSession
 * 
 * @property int $id
 * @property string $session_id
 * @property int|null $user_id
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $ip
 * 
 * @property AdminUser|null $admin_user
 *
 * @package Laragento\Models
 */
class AdminUserSession extends Model
{
	protected $table = 'admin_user_session';

	protected $casts = [
		'user_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'session_id',
		'user_id',
		'status',
		'ip'
	];

	public function admin_user()
	{
		return $this->belongsTo(AdminUser::class, 'user_id');
	}
}
