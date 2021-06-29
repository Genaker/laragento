<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductBundlePriceIndex
 * 
 * @property int $entity_id
 * @property int $website_id
 * @property int $customer_group_id
 * @property float $min_price
 * @property float $max_price
 * 
 * @property CustomerGroup $customer_group
 * @property CatalogProductEntity $catalog_product_entity
 * @property StoreWebsite $store_website
 *
 * @package Laragento\Models
 */
class CatalogProductBundlePriceIndex extends Model
{
	protected $table = 'catalog_product_bundle_price_index';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'entity_id' => 'int',
		'website_id' => 'int',
		'customer_group_id' => 'int',
		'min_price' => 'float',
		'max_price' => 'float'
	];

	protected $fillable = [
		'min_price',
		'max_price'
	];

	public function customer_group()
	{
		return $this->belongsTo(CustomerGroup::class);
	}

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'entity_id');
	}

	public function store_website()
	{
		return $this->belongsTo(StoreWebsite::class, 'website_id');
	}
}
