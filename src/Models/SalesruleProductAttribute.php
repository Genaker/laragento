<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesruleProductAttribute
 * 
 * @property int $rule_id
 * @property int $website_id
 * @property int $customer_group_id
 * @property int $attribute_id
 * 
 * @property EavAttribute $eav_attribute
 * @property CustomerGroup $customer_group
 * @property Salesrule $salesrule
 * @property StoreWebsite $store_website
 *
 * @package Laragento\Models
 */
class SalesruleProductAttribute extends Model
{
	protected $table = 'salesrule_product_attribute';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'rule_id' => 'int',
		'website_id' => 'int',
		'customer_group_id' => 'int',
		'attribute_id' => 'int'
	];

	public function eav_attribute()
	{
		return $this->belongsTo(EavAttribute::class, 'attribute_id');
	}

	public function customer_group()
	{
		return $this->belongsTo(CustomerGroup::class);
	}

	public function salesrule()
	{
		return $this->belongsTo(Salesrule::class, 'rule_id');
	}

	public function store_website()
	{
		return $this->belongsTo(StoreWebsite::class, 'website_id');
	}
}
