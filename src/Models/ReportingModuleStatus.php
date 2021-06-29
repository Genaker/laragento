<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReportingModuleStatus
 * 
 * @property int $entity_id
 * @property string|null $name
 * @property string|null $active
 * @property string|null $setup_version
 * @property string|null $state
 * @property Carbon $updated_at
 *
 * @package Laragento\Models
 */
class ReportingModuleStatus extends Model
{
	protected $table = 'reporting_module_status';
	protected $primaryKey = 'entity_id';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'active',
		'setup_version',
		'state'
	];
}
