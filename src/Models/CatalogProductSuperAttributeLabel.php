<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductSuperAttributeLabel
 * 
 * @property int $value_id
 * @property int $product_super_attribute_id
 * @property int $store_id
 * @property int|null $use_default
 * @property string|null $value
 * 
 * @property Store $store
 * @property CatalogProductSuperAttribute $catalog_product_super_attribute
 *
 * @package Laragento\Models
 */
class CatalogProductSuperAttributeLabel extends Model
{
	protected $table = 'catalog_product_super_attribute_label';
	protected $primaryKey = 'value_id';
	public $timestamps = false;

	protected $casts = [
		'product_super_attribute_id' => 'int',
		'store_id' => 'int',
		'use_default' => 'int'
	];

	protected $fillable = [
		'product_super_attribute_id',
		'store_id',
		'use_default',
		'value'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function catalog_product_super_attribute()
	{
		return $this->belongsTo(CatalogProductSuperAttribute::class, 'product_super_attribute_id');
	}
}
