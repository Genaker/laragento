<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductIndexPriceCfgOptAgrIdx
 * 
 * @property int $parent_id
 * @property int $child_id
 * @property int $customer_group_id
 * @property int $website_id
 * @property float|null $price
 * @property float|null $tier_price
 *
 * @package Laragento\Models
 */
class CatalogProductIndexPriceCfgOptAgrIdx extends Model
{
	protected $table = 'catalog_product_index_price_cfg_opt_agr_idx';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'parent_id' => 'int',
		'child_id' => 'int',
		'customer_group_id' => 'int',
		'website_id' => 'int',
		'price' => 'float',
		'tier_price' => 'float'
	];

	protected $fillable = [
		'price',
		'tier_price'
	];
}
