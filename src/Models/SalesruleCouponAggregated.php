<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesruleCouponAggregated
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
 * @property float $subtotal_amount_actual
 * @property float $discount_amount_actual
 * @property float $total_amount_actual
 * @property string|null $rule_name
 * 
 * @property Store|null $store
 *
 * @package Laragento\Models
 */
class SalesruleCouponAggregated extends Model
{
	protected $table = 'salesrule_coupon_aggregated';
	public $timestamps = false;

	protected $casts = [
		'store_id' => 'int',
		'coupon_uses' => 'int',
		'subtotal_amount' => 'float',
		'discount_amount' => 'float',
		'total_amount' => 'float',
		'subtotal_amount_actual' => 'float',
		'discount_amount_actual' => 'float',
		'total_amount_actual' => 'float'
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
		'subtotal_amount_actual',
		'discount_amount_actual',
		'total_amount_actual',
		'rule_name'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
