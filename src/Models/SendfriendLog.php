<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SendfriendLog
 * 
 * @property int $log_id
 * @property int $ip
 * @property int $time
 * @property int $website_id
 *
 * @package Laragento\Models
 */
class SendfriendLog extends Model
{
	protected $table = 'sendfriend_log';
	protected $primaryKey = 'log_id';
	public $timestamps = false;

	protected $casts = [
		'ip' => 'int',
		'time' => 'int',
		'website_id' => 'int'
	];

	protected $fillable = [
		'ip',
		'time',
		'website_id'
	];
}
