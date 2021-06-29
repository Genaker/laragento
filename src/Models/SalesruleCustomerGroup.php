<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesruleCustomerGroup
 * 
 * @property int $rule_id
 * @property int $customer_group_id
 * 
 * @property CustomerGroup $customer_group
 * @property Salesrule $salesrule
 *
 * @package Laragento\Models
 */
class SalesruleCustomerGroup extends Model
{
	protected $table = 'salesrule_customer_group';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'rule_id' => 'int',
		'customer_group_id' => 'int'
	];

	public function customer_group()
	{
		return $this->belongsTo(CustomerGroup::class);
	}

	public function salesrule()
	{
		return $this->belongsTo(Salesrule::class, 'rule_id');
	}
}
