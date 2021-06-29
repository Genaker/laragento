<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cache
 * 
 * @property string $id
 * @property mediumblob|null $data
 * @property int|null $create_time
 * @property int|null $update_time
 * @property int|null $expire_time
 *
 * @package Laragento\Models
 */
class Cache extends Model
{
	protected $table = 'cache';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'data' => 'mediumblob',
		'create_time' => 'int',
		'update_time' => 'int',
		'expire_time' => 'int'
	];

	protected $fillable = [
		'data',
		'create_time',
		'update_time',
		'expire_time'
	];
}
