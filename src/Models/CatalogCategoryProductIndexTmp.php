<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogCategoryProductIndexTmp
 * 
 * @property int $category_id
 * @property int $product_id
 * @property int $position
 * @property int $is_parent
 * @property int $store_id
 * @property int $visibility
 *
 * @package Laragento\Models
 */
class CatalogCategoryProductIndexTmp extends Model
{
	protected $table = 'catalog_category_product_index_tmp';
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
