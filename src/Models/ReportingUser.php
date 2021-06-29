<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReportingUser
 * 
 * @property int $entity_id
 * @property string|null $type
 * @property string|null $action
 * @property Carbon $updated_at
 *
 * @package Laragento\Models
 */
class ReportingUser extends Model
{
	protected $table = 'reporting_users';
	protected $primaryKey = 'entity_id';
	public $timestamps = false;

	protected $fillable = [
		'type',
		'action'
	];
}
