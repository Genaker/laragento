<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogruleProduct
 * 
 * @property int $rule_product_id
 * @property int $rule_id
 * @property int $from_time
 * @property int $to_time
 * @property int|null $customer_group_id
 * @property int $product_id
 * @property string|null $action_operator
 * @property float $action_amount
 * @property int $action_stop
 * @property int $sort_order
 * @property int $website_id
 *
 * @package Laragento\Models
 */
class CatalogruleProduct extends Model
{
	protected $table = 'catalogrule_product';
	protected $primaryKey = 'rule_product_id';
	public $timestamps = false;

	protected $casts = [
		'rule_id' => 'int',
		'from_time' => 'int',
		'to_time' => 'int',
		'customer_group_id' => 'int',
		'product_id' => 'int',
		'action_amount' => 'float',
		'action_stop' => 'int',
		'sort_order' => 'int',
		'website_id' => 'int'
	];

	protected $fillable = [
		'rule_id',
		'from_time',
		'to_time',
		'customer_group_id',
		'product_id',
		'action_operator',
		'action_amount',
		'action_stop',
		'sort_order',
		'website_id'
	];
}
