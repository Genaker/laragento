<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductOptionTypeValue
 * 
 * @property int $option_type_id
 * @property int $option_id
 * @property string|null $sku
 * @property int $sort_order
 * 
 * @property CatalogProductOption $catalog_product_option
 * @property Collection|CatalogProductOptionTypePrice[] $catalog_product_option_type_prices
 * @property Collection|CatalogProductOptionTypeTitle[] $catalog_product_option_type_titles
 *
 * @package Laragento\Models
 */
class CatalogProductOptionTypeValue extends Model
{
	protected $table = 'catalog_product_option_type_value';
	protected $primaryKey = 'option_type_id';
	public $timestamps = false;

	protected $casts = [
		'option_id' => 'int',
		'sort_order' => 'int'
	];

	protected $fillable = [
		'option_id',
		'sku',
		'sort_order'
	];

	public function catalog_product_option()
	{
		return $this->belongsTo(CatalogProductOption::class, 'option_id');
	}

	public function catalog_product_option_type_prices()
	{
		return $this->hasMany(CatalogProductOptionTypePrice::class, 'option_type_id');
	}

	public function catalog_product_option_type_titles()
	{
		return $this->hasMany(CatalogProductOptionTypeTitle::class, 'option_type_id');
	}
}
