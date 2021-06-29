<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesruleCouponUsage
 * 
 * @property int $coupon_id
 * @property int $customer_id
 * @property int $times_used
 * 
 * @property SalesruleCoupon $salesrule_coupon
 * @property CustomerEntity $customer_entity
 *
 * @package Laragento\Models
 */
class SalesruleCouponUsage extends Model
{
	protected $table = 'salesrule_coupon_usage';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'coupon_id' => 'int',
		'customer_id' => 'int',
		'times_used' => 'int'
	];

	protected $fillable = [
		'times_used'
	];

	public function salesrule_coupon()
	{
		return $this->belongsTo(SalesruleCoupon::class, 'coupon_id');
	}

	public function customer_entity()
	{
		return $this->belongsTo(CustomerEntity::class, 'customer_id');
	}
}
