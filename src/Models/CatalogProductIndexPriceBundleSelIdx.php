<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductIndexPriceBundleSelIdx
 * 
 * @property int $entity_id
 * @property int $customer_group_id
 * @property int $website_id
 * @property int $option_id
 * @property int $selection_id
 * @property int|null $group_type
 * @property int|null $is_required
 * @property float|null $price
 * @property float|null $tier_price
 *
 * @package Laragento\Models
 */
class CatalogProductIndexPriceBundleSelIdx extends Model
{
	protected $table = 'catalog_product_index_price_bundle_sel_idx';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'entity_id' => 'int',
		'customer_group_id' => 'int',
		'website_id' => 'int',
		'option_id' => 'int',
		'selection_id' => 'int',
		'group_type' => 'int',
		'is_required' => 'int',
		'price' => 'float',
		'tier_price' => 'float'
	];

	protected $fillable = [
		'group_type',
		'is_required',
		'price',
		'tier_price'
	];
}
