<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Flag
 * 
 * @property int $flag_id
 * @property string $flag_code
 * @property int $state
 * @property string|null $flag_data
 * @property Carbon $last_update
 *
 * @package Laragento\Models
 */
class Flag extends Model
{
	protected $table = 'flag';
	protected $primaryKey = 'flag_id';
	public $timestamps = false;

	protected $casts = [
		'state' => 'int'
	];

	protected $dates = [
		'last_update'
	];

	protected $fillable = [
		'flag_code',
		'state',
		'flag_data',
		'last_update'
	];
}
