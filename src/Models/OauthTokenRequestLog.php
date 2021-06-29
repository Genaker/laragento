<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OauthTokenRequestLog
 * 
 * @property int $log_id
 * @property string $user_name
 * @property int $user_type
 * @property int|null $failures_count
 * @property Carbon $lock_expires_at
 *
 * @package Laragento\Models
 */
class OauthTokenRequestLog extends Model
{
	protected $table = 'oauth_token_request_log';
	protected $primaryKey = 'log_id';
	public $timestamps = false;

	protected $casts = [
		'user_type' => 'int',
		'failures_count' => 'int'
	];

	protected $dates = [
		'lock_expires_at'
	];

	protected $fillable = [
		'user_name',
		'user_type',
		'failures_count',
		'lock_expires_at'
	];
}
