<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminSystemMessage
 * 
 * @property string $identity
 * @property int $severity
 * @property Carbon $created_at
 *
 * @package Laragento\Models
 */
class AdminSystemMessage extends Model
{
	protected $table = 'admin_system_messages';
	protected $primaryKey = 'identity';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'severity' => 'int'
	];

	protected $fillable = [
		'severity'
	];
}
