<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminUser
 * 
 * @property int $user_id
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $email
 * @property string|null $username
 * @property string $password
 * @property Carbon $created
 * @property Carbon $modified
 * @property Carbon|null $logdate
 * @property int $lognum
 * @property int $reload_acl_flag
 * @property int $is_active
 * @property string|null $extra
 * @property string|null $rp_token
 * @property Carbon|null $rp_token_created_at
 * @property string $interface_locale
 * @property int|null $failures_num
 * @property Carbon|null $first_failure
 * @property Carbon|null $lock_expires
 * 
 * @property Collection|AdminPassword[] $admin_passwords
 * @property AdminUserExpiration $admin_user_expiration
 * @property Collection|AdminUserSession[] $admin_user_sessions
 * @property Collection|OauthToken[] $oauth_tokens
 * @property ReleaseNotificationViewerLog $release_notification_viewer_log
 * @property Collection|UiBookmark[] $ui_bookmarks
 *
 * @package Laragento\Models
 */
class AdminUser extends Model
{
	protected $table = 'admin_user';
	protected $primaryKey = 'user_id';
	public $timestamps = false;

	protected $casts = [
		'lognum' => 'int',
		'reload_acl_flag' => 'int',
		'is_active' => 'int',
		'failures_num' => 'int'
	];

	protected $dates = [
		'created',
		'modified',
		'logdate',
		'rp_token_created_at',
		'first_failure',
		'lock_expires'
	];

	protected $hidden = [
		'password',
		'rp_token'
	];

	protected $fillable = [
		'firstname',
		'lastname',
		'email',
		'username',
		'password',
		'created',
		'modified',
		'logdate',
		'lognum',
		'reload_acl_flag',
		'is_active',
		'extra',
		'rp_token',
		'rp_token_created_at',
		'interface_locale',
		'failures_num',
		'first_failure',
		'lock_expires'
	];

	public function admin_passwords()
	{
		return $this->hasMany(AdminPassword::class, 'user_id');
	}

	public function admin_user_expiration()
	{
		return $this->hasOne(AdminUserExpiration::class, 'user_id');
	}

	public function admin_user_sessions()
	{
		return $this->hasMany(AdminUserSession::class, 'user_id');
	}

	public function oauth_tokens()
	{
		return $this->hasMany(OauthToken::class, 'admin_id');
	}

	public function release_notification_viewer_log()
	{
		return $this->hasOne(ReleaseNotificationViewerLog::class, 'viewer_id');
	}

	public function ui_bookmarks()
	{
		return $this->hasMany(UiBookmark::class, 'user_id');
	}
}
