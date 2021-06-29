<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminnotificationInbox
 * 
 * @property int $notification_id
 * @property int $severity
 * @property Carbon $date_added
 * @property string $title
 * @property string|null $description
 * @property string|null $url
 * @property int $is_read
 * @property int $is_remove
 *
 * @package Laragento\Models
 */
class AdminnotificationInbox extends Model
{
	protected $table = 'adminnotification_inbox';
	protected $primaryKey = 'notification_id';
	public $timestamps = false;

	protected $casts = [
		'severity' => 'int',
		'is_read' => 'int',
		'is_remove' => 'int'
	];

	protected $dates = [
		'date_added'
	];

	protected $fillable = [
		'severity',
		'date_added',
		'title',
		'description',
		'url',
		'is_read',
		'is_remove'
	];
}
