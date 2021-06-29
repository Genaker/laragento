<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogruleCustomerGroup
 * 
 * @property int $rule_id
 * @property int $customer_group_id
 * 
 * @property Catalogrule $catalogrule
 * @property CustomerGroup $customer_group
 *
 * @package Laragento\Models
 */
class CatalogruleCustomerGroup extends Model
{
	protected $table = 'catalogrule_customer_group';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'rule_id' => 'int',
		'customer_group_id' => 'int'
	];

	public function catalogrule()
	{
		return $this->belongsTo(Catalogrule::class, 'rule_id');
	}

	public function customer_group()
	{
		return $this->belongsTo(CustomerGroup::class);
	}
}
