<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminUserExpiration
 * 
 * @property int $user_id
 * @property Carbon $expires_at
 * 
 * @property AdminUser $admin_user
 *
 * @package Laragento\Models
 */
class AdminUserExpiration extends Model
{
	protected $table = 'admin_user_expiration';
	protected $primaryKey = 'user_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $dates = [
		'expires_at'
	];

	protected $fillable = [
		'expires_at'
	];

	public function admin_user()
	{
		return $this->belongsTo(AdminUser::class, 'user_id');
	}
}
