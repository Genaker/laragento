<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ReleaseNotificationViewerLog
 * 
 * @property int $id
 * @property int $viewer_id
 * @property string $last_view_version
 * 
 * @property AdminUser $admin_user
 *
 * @package Laragento\Models
 */
class ReleaseNotificationViewerLog extends Model
{
	protected $table = 'release_notification_viewer_log';
	public $timestamps = false;

	protected $casts = [
		'viewer_id' => 'int'
	];

	protected $fillable = [
		'viewer_id',
		'last_view_version'
	];

	public function admin_user()
	{
		return $this->belongsTo(AdminUser::class, 'viewer_id');
	}
}
