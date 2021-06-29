<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductBundleSelectionPrice
 * 
 * @property int $selection_id
 * @property int $website_id
 * @property int $selection_price_type
 * @property float $selection_price_value
 * @property int $parent_product_id
 * 
 * @property StoreWebsite $store_website
 * @property CatalogProductBundleSelection $catalog_product_bundle_selection
 *
 * @package Laragento\Models
 */
class CatalogProductBundleSelectionPrice extends Model
{
	protected $table = 'catalog_product_bundle_selection_price';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'selection_id' => 'int',
		'website_id' => 'int',
		'selection_price_type' => 'int',
		'selection_price_value' => 'float',
		'parent_product_id' => 'int'
	];

	protected $fillable = [
		'selection_price_type',
		'selection_price_value'
	];

	public function store_website()
	{
		return $this->belongsTo(StoreWebsite::class, 'website_id');
	}

	public function catalog_product_bundle_selection()
	{
		return $this->belongsTo(CatalogProductBundleSelection::class, 'selection_id');
	}
}
