<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesruleCoupon
 * 
 * @property int $coupon_id
 * @property int $rule_id
 * @property string|null $code
 * @property int|null $usage_limit
 * @property int|null $usage_per_customer
 * @property int $times_used
 * @property Carbon|null $expiration_date
 * @property int|null $is_primary
 * @property Carbon|null $created_at
 * @property int|null $type
 * 
 * @property Salesrule $salesrule
 * @property Collection|SalesruleCouponUsage[] $salesrule_coupon_usages
 *
 * @package Laragento\Models
 */
class SalesruleCoupon extends Model
{
	protected $table = 'salesrule_coupon';
	protected $primaryKey = 'coupon_id';
	public $timestamps = false;

	protected $casts = [
		'rule_id' => 'int',
		'usage_limit' => 'int',
		'usage_per_customer' => 'int',
		'times_used' => 'int',
		'is_primary' => 'int',
		'type' => 'int'
	];

	protected $dates = [
		'expiration_date'
	];

	protected $fillable = [
		'rule_id',
		'code',
		'usage_limit',
		'usage_per_customer',
		'times_used',
		'expiration_date',
		'is_primary',
		'type'
	];

	public function salesrule()
	{
		return $this->belongsTo(Salesrule::class, 'rule_id');
	}

	public function salesrule_coupon_usages()
	{
		return $this->hasMany(SalesruleCouponUsage::class, 'coupon_id');
	}
}
