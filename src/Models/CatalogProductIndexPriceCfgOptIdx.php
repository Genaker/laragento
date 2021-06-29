<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductIndexPriceCfgOptIdx
 * 
 * @property int $entity_id
 * @property int $customer_group_id
 * @property int $website_id
 * @property float|null $min_price
 * @property float|null $max_price
 * @property float|null $tier_price
 *
 * @package Laragento\Models
 */
class CatalogProductIndexPriceCfgOptIdx extends Model
{
	protected $table = 'catalog_product_index_price_cfg_opt_idx';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'entity_id' => 'int',
		'customer_group_id' => 'int',
		'website_id' => 'int',
		'min_price' => 'float',
		'max_price' => 'float',
		'tier_price' => 'float'
	];

	protected $fillable = [
		'min_price',
		'max_price',
		'tier_price'
	];
}
