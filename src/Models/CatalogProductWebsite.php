<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductWebsite
 * 
 * @property int $product_id
 * @property int $website_id
 * 
 * @property StoreWebsite $store_website
 * @property CatalogProductEntity $catalog_product_entity
 *
 * @package Laragento\Models
 */
class CatalogProductWebsite extends Model
{
	protected $table = 'catalog_product_website';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'website_id' => 'int'
	];

	public function store_website()
	{
		return $this->belongsTo(StoreWebsite::class, 'website_id');
	}

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'product_id');
	}
}
