<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Session
 * 
 * @property string $session_id
 * @property int $session_expires
 * @property mediumblob $session_data
 *
 * @package Laragento\Models
 */
class Session extends Model
{
	protected $table = 'session';
	protected $primaryKey = 'session_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'session_expires' => 'int',
		'session_data' => 'mediumblob'
	];

	protected $fillable = [
		'session_expires',
		'session_data'
	];
}
