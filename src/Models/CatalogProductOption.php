<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductOption
 * 
 * @property int $option_id
 * @property int $product_id
 * @property string|null $type
 * @property int $is_require
 * @property string|null $sku
 * @property int|null $max_characters
 * @property string|null $file_extension
 * @property int|null $image_size_x
 * @property int|null $image_size_y
 * @property int $sort_order
 * 
 * @property CatalogProductEntity $catalog_product_entity
 * @property Collection|CatalogProductOptionPrice[] $catalog_product_option_prices
 * @property Collection|CatalogProductOptionTitle[] $catalog_product_option_titles
 * @property Collection|CatalogProductOptionTypeValue[] $catalog_product_option_type_values
 *
 * @package Laragento\Models
 */
class CatalogProductOption extends Model
{
	protected $table = 'catalog_product_option';
	protected $primaryKey = 'option_id';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'is_require' => 'int',
		'max_characters' => 'int',
		'image_size_x' => 'int',
		'image_size_y' => 'int',
		'sort_order' => 'int'
	];

	protected $fillable = [
		'product_id',
		'type',
		'is_require',
		'sku',
		'max_characters',
		'file_extension',
		'image_size_x',
		'image_size_y',
		'sort_order'
	];

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'product_id');
	}

	public function catalog_product_option_prices()
	{
		return $this->hasMany(CatalogProductOptionPrice::class, 'option_id');
	}

	public function catalog_product_option_titles()
	{
		return $this->hasMany(CatalogProductOptionTitle::class, 'option_id');
	}

	public function catalog_product_option_type_values()
	{
		return $this->hasMany(CatalogProductOptionTypeValue::class, 'option_id');
	}
}
