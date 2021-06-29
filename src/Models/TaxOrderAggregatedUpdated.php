<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TaxOrderAggregatedUpdated
 * 
 * @property int $id
 * @property Carbon|null $period
 * @property int|null $store_id
 * @property string $code
 * @property string $order_status
 * @property float|null $percent
 * @property int $orders_count
 * @property float|null $tax_base_amount_sum
 * 
 * @property Store|null $store
 *
 * @package Laragento\Models
 */
class TaxOrderAggregatedUpdated extends Model
{
	protected $table = 'tax_order_aggregated_updated';
	public $timestamps = false;

	protected $casts = [
		'store_id' => 'int',
		'percent' => 'float',
		'orders_count' => 'int',
		'tax_base_amount_sum' => 'float'
	];

	protected $dates = [
		'period'
	];

	protected $fillable = [
		'period',
		'store_id',
		'code',
		'order_status',
		'percent',
		'orders_count',
		'tax_base_amount_sum'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
