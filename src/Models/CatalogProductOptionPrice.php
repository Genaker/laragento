<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductOptionPrice
 * 
 * @property int $option_price_id
 * @property int $option_id
 * @property int $store_id
 * @property float $price
 * @property string $price_type
 * 
 * @property Store $store
 * @property CatalogProductOption $catalog_product_option
 *
 * @package Laragento\Models
 */
class CatalogProductOptionPrice extends Model
{
	protected $table = 'catalog_product_option_price';
	protected $primaryKey = 'option_price_id';
	public $timestamps = false;

	protected $casts = [
		'option_id' => 'int',
		'store_id' => 'int',
		'price' => 'float'
	];

	protected $fillable = [
		'option_id',
		'store_id',
		'price',
		'price_type'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function catalog_product_option()
	{
		return $this->belongsTo(CatalogProductOption::class, 'option_id');
	}
}
