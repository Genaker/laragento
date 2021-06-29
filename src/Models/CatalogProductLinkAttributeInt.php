<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductLinkAttributeInt
 * 
 * @property int $value_id
 * @property int|null $product_link_attribute_id
 * @property int $link_id
 * @property int $value
 * 
 * @property CatalogProductLink $catalog_product_link
 * @property CatalogProductLinkAttribute|null $catalog_product_link_attribute
 *
 * @package Laragento\Models
 */
class CatalogProductLinkAttributeInt extends Model
{
	protected $table = 'catalog_product_link_attribute_int';
	protected $primaryKey = 'value_id';
	public $timestamps = false;

	protected $casts = [
		'product_link_attribute_id' => 'int',
		'link_id' => 'int',
		'value' => 'int'
	];

	protected $fillable = [
		'product_link_attribute_id',
		'link_id',
		'value'
	];

	public function catalog_product_link()
	{
		return $this->belongsTo(CatalogProductLink::class, 'link_id');
	}

	public function catalog_product_link_attribute()
	{
		return $this->belongsTo(CatalogProductLinkAttribute::class, 'product_link_attribute_id');
	}
}
