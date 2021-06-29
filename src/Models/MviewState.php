<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MviewState
 * 
 * @property int $state_id
 * @property string|null $view_id
 * @property string|null $mode
 * @property string|null $status
 * @property Carbon|null $updated
 * @property int|null $version_id
 *
 * @package Laragento\Models
 */
class MviewState extends Model
{
	protected $table = 'mview_state';
	protected $primaryKey = 'state_id';
	public $timestamps = false;

	protected $casts = [
		'version_id' => 'int'
	];

	protected $dates = [
		'updated'
	];

	protected $fillable = [
		'view_id',
		'mode',
		'status',
		'updated',
		'version_id'
	];
}
