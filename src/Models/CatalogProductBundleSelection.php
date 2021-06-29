<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductBundleSelection
 * 
 * @property int $selection_id
 * @property int $option_id
 * @property int $parent_product_id
 * @property int $product_id
 * @property int $position
 * @property int $is_default
 * @property int $selection_price_type
 * @property float $selection_price_value
 * @property float|null $selection_qty
 * @property int $selection_can_change_qty
 * 
 * @property CatalogProductBundleOption $catalog_product_bundle_option
 * @property CatalogProductEntity $catalog_product_entity
 * @property Collection|CatalogProductBundleSelectionPrice[] $catalog_product_bundle_selection_prices
 *
 * @package Laragento\Models
 */
class CatalogProductBundleSelection extends Model
{
	protected $table = 'catalog_product_bundle_selection';
	protected $primaryKey = 'selection_id';
	public $timestamps = false;

	protected $casts = [
		'option_id' => 'int',
		'parent_product_id' => 'int',
		'product_id' => 'int',
		'position' => 'int',
		'is_default' => 'int',
		'selection_price_type' => 'int',
		'selection_price_value' => 'float',
		'selection_qty' => 'float',
		'selection_can_change_qty' => 'int'
	];

	protected $fillable = [
		'option_id',
		'parent_product_id',
		'product_id',
		'position',
		'is_default',
		'selection_price_type',
		'selection_price_value',
		'selection_qty',
		'selection_can_change_qty'
	];

	public function catalog_product_bundle_option()
	{
		return $this->belongsTo(CatalogProductBundleOption::class, 'option_id');
	}

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'product_id');
	}

	public function catalog_product_bundle_selection_prices()
	{
		return $this->hasMany(CatalogProductBundleSelectionPrice::class, 'selection_id');
	}
}
