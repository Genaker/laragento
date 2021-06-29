<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductIndexPriceBundleOptIdx
 * 
 * @property int $entity_id
 * @property int $customer_group_id
 * @property int $website_id
 * @property int $option_id
 * @property float|null $min_price
 * @property float|null $alt_price
 * @property float|null $max_price
 * @property float|null $tier_price
 * @property float|null $alt_tier_price
 *
 * @package Laragento\Models
 */
class CatalogProductIndexPriceBundleOptIdx extends Model
{
	protected $table = 'catalog_product_index_price_bundle_opt_idx';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'entity_id' => 'int',
		'customer_group_id' => 'int',
		'website_id' => 'int',
		'option_id' => 'int',
		'min_price' => 'float',
		'alt_price' => 'float',
		'max_price' => 'float',
		'tier_price' => 'float',
		'alt_tier_price' => 'float'
	];

	protected $fillable = [
		'min_price',
		'alt_price',
		'max_price',
		'tier_price',
		'alt_tier_price'
	];
}
