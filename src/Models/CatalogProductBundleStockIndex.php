<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductBundleStockIndex
 * 
 * @property int $entity_id
 * @property int $website_id
 * @property int $stock_id
 * @property int $option_id
 * @property int|null $stock_status
 *
 * @package Laragento\Models
 */
class CatalogProductBundleStockIndex extends Model
{
	protected $table = 'catalog_product_bundle_stock_index';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'entity_id' => 'int',
		'website_id' => 'int',
		'stock_id' => 'int',
		'option_id' => 'int',
		'stock_status' => 'int'
	];

	protected $fillable = [
		'stock_status'
	];
}
