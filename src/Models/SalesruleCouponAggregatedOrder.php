<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesruleCouponAggregatedOrder
 * 
 * @property int $id
 * @property Carbon $period
 * @property int|null $store_id
 * @property string|null $order_status
 * @property string|null $coupon_code
 * @property int $coupon_uses
 * @property float $subtotal_amount
 * @property float $discount_amount
 * @property float $total_amount
 * @property string|null $rule_name
 * 
 * @property Store|null $store
 *
 * @package Laragento\Models
 */
class SalesruleCouponAggregatedOrder extends Model
{
	protected $table = 'salesrule_coupon_aggregated_order';
	public $timestamps = false;

	protected $casts = [
		'store_id' => 'int',
		'coupon_uses' => 'int',
		'subtotal_amount' => 'float',
		'discount_amount' => 'float',
		'total_amount' => 'float'
	];

	protected $dates = [
		'period'
	];

	protected $fillable = [
		'period',
		'store_id',
		'order_status',
		'coupon_code',
		'coupon_uses',
		'subtotal_amount',
		'discount_amount',
		'total_amount',
		'rule_name'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
