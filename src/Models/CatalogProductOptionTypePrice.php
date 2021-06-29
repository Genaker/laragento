<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductOptionTypePrice
 * 
 * @property int $option_type_price_id
 * @property int $option_type_id
 * @property int $store_id
 * @property float $price
 * @property string $price_type
 * 
 * @property Store $store
 * @property CatalogProductOptionTypeValue $catalog_product_option_type_value
 *
 * @package Laragento\Models
 */
class CatalogProductOptionTypePrice extends Model
{
	protected $table = 'catalog_product_option_type_price';
	protected $primaryKey = 'option_type_price_id';
	public $timestamps = false;

	protected $casts = [
		'option_type_id' => 'int',
		'store_id' => 'int',
		'price' => 'float'
	];

	protected $fillable = [
		'option_type_id',
		'store_id',
		'price',
		'price_type'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function catalog_product_option_type_value()
	{
		return $this->belongsTo(CatalogProductOptionTypeValue::class, 'option_type_id');
	}
}
