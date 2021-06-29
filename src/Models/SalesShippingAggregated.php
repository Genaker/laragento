<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesShippingAggregated
 * 
 * @property int $id
 * @property Carbon|null $period
 * @property int|null $store_id
 * @property string|null $order_status
 * @property string|null $shipping_description
 * @property int $orders_count
 * @property float|null $total_shipping
 * @property float|null $total_shipping_actual
 * 
 * @property Store|null $store
 *
 * @package Laragento\Models
 */
class SalesShippingAggregated extends Model
{
	protected $table = 'sales_shipping_aggregated';
	public $timestamps = false;

	protected $casts = [
		'store_id' => 'int',
		'orders_count' => 'int',
		'total_shipping' => 'float',
		'total_shipping_actual' => 'float'
	];

	protected $dates = [
		'period'
	];

	protected $fillable = [
		'period',
		'store_id',
		'order_status',
		'shipping_description',
		'orders_count',
		'total_shipping',
		'total_shipping_actual'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
