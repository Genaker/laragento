<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogUrlRewriteProductCategory
 * 
 * @property int $url_rewrite_id
 * @property int $category_id
 * @property int $product_id
 * 
 * @property CatalogCategoryEntity $catalog_category_entity
 * @property CatalogProductEntity $catalog_product_entity
 * @property UrlRewrite $url_rewrite
 *
 * @package Laragento\Models
 */
class CatalogUrlRewriteProductCategory extends Model
{
	protected $table = 'catalog_url_rewrite_product_category';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'url_rewrite_id' => 'int',
		'category_id' => 'int',
		'product_id' => 'int'
	];

	protected $fillable = [
		'url_rewrite_id',
		'category_id',
		'product_id'
	];

	public function catalog_category_entity()
	{
		return $this->belongsTo(CatalogCategoryEntity::class, 'category_id');
	}

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'product_id');
	}

	public function url_rewrite()
	{
		return $this->belongsTo(UrlRewrite::class);
	}
}
