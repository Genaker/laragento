<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductIndexPriceTmp
 * 
 * @property int $entity_id
 * @property int $customer_group_id
 * @property int $website_id
 * @property int|null $tax_class_id
 * @property float|null $price
 * @property float|null $final_price
 * @property float|null $min_price
 * @property float|null $max_price
 * @property float|null $tier_price
 *
 * @package Laragento\Models
 */
class CatalogProductIndexPriceTmp extends Model
{
	protected $table = 'catalog_product_index_price_tmp';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'entity_id' => 'int',
		'customer_group_id' => 'int',
		'website_id' => 'int',
		'tax_class_id' => 'int',
		'price' => 'float',
		'final_price' => 'float',
		'min_price' => 'float',
		'max_price' => 'float',
		'tier_price' => 'float'
	];

	protected $fillable = [
		'tax_class_id',
		'price',
		'final_price',
		'min_price',
		'max_price',
		'tier_price'
	];
}
