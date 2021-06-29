<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PasswordResetRequestEvent
 * 
 * @property int $id
 * @property int $request_type
 * @property string|null $account_reference
 * @property Carbon $created_at
 * @property string $ip
 *
 * @package Laragento\Models
 */
class PasswordResetRequestEvent extends Model
{
	protected $table = 'password_reset_request_event';
	public $timestamps = false;

	protected $casts = [
		'request_type' => 'int'
	];

	protected $fillable = [
		'request_type',
		'account_reference',
		'ip'
	];
}
