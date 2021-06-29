<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReportingCount
 * 
 * @property int $entity_id
 * @property string|null $type
 * @property int|null $count
 * @property Carbon $updated_at
 *
 * @package Laragento\Models
 */
class ReportingCount extends Model
{
	protected $table = 'reporting_counts';
	protected $primaryKey = 'entity_id';
	public $timestamps = false;

	protected $casts = [
		'count' => 'int'
	];

	protected $fillable = [
		'type',
		'count'
	];
}
