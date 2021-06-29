<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogCategoryProductIndex
 * 
 * @property int $category_id
 * @property int $product_id
 * @property int|null $position
 * @property int $is_parent
 * @property int $store_id
 * @property int $visibility
 *
 * @package Laragento\Models
 */
class CatalogCategoryProductIndex extends Model
{
	protected $table = 'catalog_category_product_index';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'category_id' => 'int',
		'product_id' => 'int',
		'position' => 'int',
		'is_parent' => 'int',
		'store_id' => 'int',
		'visibility' => 'int'
	];

	protected $fillable = [
		'position',
		'is_parent',
		'visibility'
	];
}
