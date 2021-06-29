<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesOrderAggregatedUpdated
 * 
 * @property int $id
 * @property Carbon|null $period
 * @property int|null $store_id
 * @property string $order_status
 * @property int $orders_count
 * @property float $total_qty_ordered
 * @property float $total_qty_invoiced
 * @property float $total_income_amount
 * @property float $total_revenue_amount
 * @property float $total_profit_amount
 * @property float $total_invoiced_amount
 * @property float $total_canceled_amount
 * @property float $total_paid_amount
 * @property float $total_refunded_amount
 * @property float $total_tax_amount
 * @property float $total_tax_amount_actual
 * @property float $total_shipping_amount
 * @property float $total_shipping_amount_actual
 * @property float $total_discount_amount
 * @property float $total_discount_amount_actual
 * 
 * @property Store|null $store
 *
 * @package Laragento\Models
 */
class SalesOrderAggregatedUpdated extends Model
{
	protected $table = 'sales_order_aggregated_updated';
	public $timestamps = false;

	protected $casts = [
		'store_id' => 'int',
		'orders_count' => 'int',
		'total_qty_ordered' => 'float',
		'total_qty_invoiced' => 'float',
		'total_income_amount' => 'float',
		'total_revenue_amount' => 'float',
		'total_profit_amount' => 'float',
		'total_invoiced_amount' => 'float',
		'total_canceled_amount' => 'float',
		'total_paid_amount' => 'float',
		'total_refunded_amount' => 'float',
		'total_tax_amount' => 'float',
		'total_tax_amount_actual' => 'float',
		'total_shipping_amount' => 'float',
		'total_shipping_amount_actual' => 'float',
		'total_discount_amount' => 'float',
		'total_discount_amount_actual' => 'float'
	];

	protected $dates = [
		'period'
	];

	protected $fillable = [
		'period',
		'store_id',
		'order_status',
		'orders_count',
		'total_qty_ordered',
		'total_qty_invoiced',
		'total_income_amount',
		'total_revenue_amount',
		'total_profit_amount',
		'total_invoiced_amount',
		'total_canceled_amount',
		'total_paid_amount',
		'total_refunded_amount',
		'total_tax_amount',
		'total_tax_amount_actual',
		'total_shipping_amount',
		'total_shipping_amount_actual',
		'total_discount_amount',
		'total_discount_amount_actual'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
