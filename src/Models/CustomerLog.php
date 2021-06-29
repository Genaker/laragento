<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerLog
 * 
 * @property int $log_id
 * @property int $customer_id
 * @property Carbon|null $last_login_at
 * @property Carbon|null $last_logout_at
 *
 * @package Laragento\Models
 */
class CustomerLog extends Model
{
	protected $table = 'customer_log';
	protected $primaryKey = 'log_id';
	public $timestamps = false;

	protected $casts = [
		'customer_id' => 'int'
	];

	protected $dates = [
		'last_login_at',
		'last_logout_at'
	];

	protected $fillable = [
		'customer_id',
		'last_login_at',
		'last_logout_at'
	];
}
