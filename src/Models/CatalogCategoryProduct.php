<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogCategoryProduct
 * 
 * @property int $entity_id
 * @property int $category_id
 * @property int $product_id
 * @property int $position
 * 
 * @property CatalogCategoryEntity $catalog_category_entity
 * @property CatalogProductEntity $catalog_product_entity
 *
 * @package Laragento\Models
 */
class CatalogCategoryProduct extends Model
{
	protected $table = 'catalog_category_product';
	public $timestamps = false;

	protected $casts = [
		'category_id' => 'int',
		'product_id' => 'int',
		'position' => 'int'
	];

	protected $fillable = [
		'position'
	];

	public function catalog_category_entity()
	{
		return $this->belongsTo(CatalogCategoryEntity::class, 'category_id');
	}

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'product_id');
	}
}
