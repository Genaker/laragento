<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductBundleOption
 * 
 * @property int $option_id
 * @property int $parent_id
 * @property int $required
 * @property int $position
 * @property string|null $type
 * 
 * @property CatalogProductEntity $catalog_product_entity
 * @property Collection|CatalogProductBundleOptionValue[] $catalog_product_bundle_option_values
 * @property Collection|CatalogProductBundleSelection[] $catalog_product_bundle_selections
 *
 * @package Laragento\Models
 */
class CatalogProductBundleOption extends Model
{
	protected $table = 'catalog_product_bundle_option';
	protected $primaryKey = 'option_id';
	public $timestamps = false;

	protected $casts = [
		'parent_id' => 'int',
		'required' => 'int',
		'position' => 'int'
	];

	protected $fillable = [
		'parent_id',
		'required',
		'position',
		'type'
	];

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'parent_id');
	}

	public function catalog_product_bundle_option_values()
	{
		return $this->hasMany(CatalogProductBundleOptionValue::class, 'option_id');
	}

	public function catalog_product_bundle_selections()
	{
		return $this->hasMany(CatalogProductBundleSelection::class, 'option_id');
	}
}
