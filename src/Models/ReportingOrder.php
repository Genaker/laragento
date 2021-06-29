<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReportingOrder
 * 
 * @property int $entity_id
 * @property int|null $customer_id
 * @property float|null $total
 * @property float|null $total_base
 * @property int $item_count
 * @property Carbon $updated_at
 *
 * @package Laragento\Models
 */
class ReportingOrder extends Model
{
	protected $table = 'reporting_orders';
	protected $primaryKey = 'entity_id';
	public $timestamps = false;

	protected $casts = [
		'customer_id' => 'int',
		'total' => 'float',
		'total_base' => 'float',
		'item_count' => 'int'
	];

	protected $fillable = [
		'customer_id',
		'total',
		'total_base',
		'item_count'
	];
}
