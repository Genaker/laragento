<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductIndexPriceDownlodIdx
 * 
 * @property int $entity_id
 * @property int $customer_group_id
 * @property int $website_id
 * @property float $min_price
 * @property float $max_price
 *
 * @package Laragento\Models
 */
class CatalogProductIndexPriceDownlodIdx extends Model
{
	protected $table = 'catalog_product_index_price_downlod_idx';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'entity_id' => 'int',
		'customer_group_id' => 'int',
		'website_id' => 'int',
		'min_price' => 'float',
		'max_price' => 'float'
	];

	protected $fillable = [
		'min_price',
		'max_price'
	];
}
