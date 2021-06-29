<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductIndexPriceFinalTmp
 * 
 * @property int $entity_id
 * @property int $customer_group_id
 * @property int $website_id
 * @property int|null $tax_class_id
 * @property float|null $orig_price
 * @property float|null $price
 * @property float|null $min_price
 * @property float|null $max_price
 * @property float|null $tier_price
 * @property float|null $base_tier
 *
 * @package Laragento\Models
 */
class CatalogProductIndexPriceFinalTmp extends Model
{
	protected $table = 'catalog_product_index_price_final_tmp';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'entity_id' => 'int',
		'customer_group_id' => 'int',
		'website_id' => 'int',
		'tax_class_id' => 'int',
		'orig_price' => 'float',
		'price' => 'float',
		'min_price' => 'float',
		'max_price' => 'float',
		'tier_price' => 'float',
		'base_tier' => 'float'
	];

	protected $fillable = [
		'tax_class_id',
		'orig_price',
		'price',
		'min_price',
		'max_price',
		'tier_price',
		'base_tier'
	];
}
