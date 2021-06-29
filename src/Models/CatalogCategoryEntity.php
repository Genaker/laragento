<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogCategoryEntity
 * 
 * @property int $entity_id
 * @property int $attribute_set_id
 * @property int $parent_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $path
 * @property int $position
 * @property int $level
 * @property int $children_count
 * 
 * @property Collection|CatalogCategoryEntityDatetime[] $catalog_category_entity_datetimes
 * @property Collection|CatalogCategoryEntityDecimal[] $catalog_category_entity_decimals
 * @property Collection|CatalogCategoryEntityInt[] $catalog_category_entity_ints
 * @property Collection|CatalogCategoryEntityText[] $catalog_category_entity_texts
 * @property Collection|CatalogCategoryEntityVarchar[] $catalog_category_entity_varchars
 * @property Collection|CatalogCategoryProduct[] $catalog_category_products
 * @property CatalogUrlRewriteProductCategory $catalog_url_rewrite_product_category
 *
 * @package Laragento\Models
 */
class CatalogCategoryEntity extends Model
{
	protected $table = 'catalog_category_entity';
	protected $primaryKey = 'entity_id';

	protected $casts = [
		'attribute_set_id' => 'int',
		'parent_id' => 'int',
		'position' => 'int',
		'level' => 'int',
		'children_count' => 'int'
	];

	protected $fillable = [
		'attribute_set_id',
		'parent_id',
		'path',
		'position',
		'level',
		'children_count'
	];

	public function catalog_category_entity_datetimes()
	{
		return $this->hasMany(CatalogCategoryEntityDatetime::class, 'entity_id');
	}

	public function catalog_category_entity_decimals()
	{
		return $this->hasMany(CatalogCategoryEntityDecimal::class, 'entity_id');
	}

	public function catalog_category_entity_ints()
	{
		return $this->hasMany(CatalogCategoryEntityInt::class, 'entity_id');
	}

	public function catalog_category_entity_texts()
	{
		return $this->hasMany(CatalogCategoryEntityText::class, 'entity_id');
	}

	public function catalog_category_entity_varchars()
	{
		return $this->hasMany(CatalogCategoryEntityVarchar::class, 'entity_id');
	}

	public function catalog_category_products()
	{
		return $this->hasMany(CatalogCategoryProduct::class, 'category_id');
	}

	public function catalog_url_rewrite_product_category()
	{
		return $this->hasOne(CatalogUrlRewriteProductCategory::class, 'category_id');
	}
}
