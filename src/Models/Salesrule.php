<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Salesrule
 * 
 * @property int $rule_id
 * @property string|null $name
 * @property string|null $description
 * @property Carbon|null $from_date
 * @property Carbon|null $to_date
 * @property int $uses_per_customer
 * @property int $is_active
 * @property string|null $conditions_serialized
 * @property string|null $actions_serialized
 * @property int $stop_rules_processing
 * @property int $is_advanced
 * @property string|null $product_ids
 * @property int $sort_order
 * @property string|null $simple_action
 * @property float $discount_amount
 * @property float|null $discount_qty
 * @property int $discount_step
 * @property int $apply_to_shipping
 * @property int $times_used
 * @property int $is_rss
 * @property int $coupon_type
 * @property int $use_auto_generation
 * @property int $uses_per_coupon
 * @property int $simple_free_shipping
 * 
 * @property Collection|SalesruleCoupon[] $salesrule_coupons
 * @property Collection|SalesruleCustomer[] $salesrule_customers
 * @property Collection|CustomerGroup[] $customer_groups
 * @property Collection|SalesruleLabel[] $salesrule_labels
 * @property Collection|SalesruleProductAttribute[] $salesrule_product_attributes
 * @property Collection|SalesruleWebsite[] $salesrule_websites
 *
 * @package Laragento\Models
 */
class Salesrule extends Model
{
	protected $table = 'salesrule';
	protected $primaryKey = 'rule_id';
	public $timestamps = false;

	protected $casts = [
		'uses_per_customer' => 'int',
		'is_active' => 'int',
		'stop_rules_processing' => 'int',
		'is_advanced' => 'int',
		'sort_order' => 'int',
		'discount_amount' => 'float',
		'discount_qty' => 'float',
		'discount_step' => 'int',
		'apply_to_shipping' => 'int',
		'times_used' => 'int',
		'is_rss' => 'int',
		'coupon_type' => 'int',
		'use_auto_generation' => 'int',
		'uses_per_coupon' => 'int',
		'simple_free_shipping' => 'int'
	];

	protected $dates = [
		'from_date',
		'to_date'
	];

	protected $fillable = [
		'name',
		'description',
		'from_date',
		'to_date',
		'uses_per_customer',
		'is_active',
		'conditions_serialized',
		'actions_serialized',
		'stop_rules_processing',
		'is_advanced',
		'product_ids',
		'sort_order',
		'simple_action',
		'discount_amount',
		'discount_qty',
		'discount_step',
		'apply_to_shipping',
		'times_used',
		'is_rss',
		'coupon_type',
		'use_auto_generation',
		'uses_per_coupon',
		'simple_free_shipping'
	];

	public function salesrule_coupons()
	{
		return $this->hasMany(SalesruleCoupon::class, 'rule_id');
	}

	public function salesrule_customers()
	{
		return $this->hasMany(SalesruleCustomer::class, 'rule_id');
	}

	public function customer_groups()
	{
		return $this->belongsToMany(CustomerGroup::class, 'salesrule_customer_group', 'rule_id');
	}

	public function salesrule_labels()
	{
		return $this->hasMany(SalesruleLabel::class, 'rule_id');
	}

	public function salesrule_product_attributes()
	{
		return $this->hasMany(SalesruleProductAttribute::class, 'rule_id');
	}

	public function salesrule_websites()
	{
		return $this->hasMany(SalesruleWebsite::class, 'rule_id');
	}
}
