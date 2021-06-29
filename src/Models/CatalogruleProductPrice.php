<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogruleProductPrice
 * 
 * @property int $rule_product_price_id
 * @property Carbon $rule_date
 * @property int|null $customer_group_id
 * @property int $product_id
 * @property float $rule_price
 * @property int $website_id
 * @property Carbon|null $latest_start_date
 * @property Carbon|null $earliest_end_date
 *
 * @package Laragento\Models
 */
class CatalogruleProductPrice extends Model
{
	protected $table = 'catalogrule_product_price';
	protected $primaryKey = 'rule_product_price_id';
	public $timestamps = false;

	protected $casts = [
		'customer_group_id' => 'int',
		'product_id' => 'int',
		'rule_price' => 'float',
		'website_id' => 'int'
	];

	protected $dates = [
		'rule_date',
		'latest_start_date',
		'earliest_end_date'
	];

	protected $fillable = [
		'rule_date',
		'customer_group_id',
		'product_id',
		'rule_price',
		'website_id',
		'latest_start_date',
		'earliest_end_date'
	];
}
