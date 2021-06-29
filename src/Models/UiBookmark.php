<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UiBookmark
 * 
 * @property int $bookmark_id
 * @property int $user_id
 * @property string $namespace
 * @property string $identifier
 * @property int $current
 * @property string|null $title
 * @property string|null $config
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property AdminUser $admin_user
 *
 * @package Laragento\Models
 */
class UiBookmark extends Model
{
	protected $table = 'ui_bookmark';
	protected $primaryKey = 'bookmark_id';

	protected $casts = [
		'user_id' => 'int',
		'current' => 'int'
	];

	protected $fillable = [
		'user_id',
		'namespace',
		'identifier',
		'current',
		'title',
		'config'
	];

	public function admin_user()
	{
		return $this->belongsTo(AdminUser::class, 'user_id');
	}
}
