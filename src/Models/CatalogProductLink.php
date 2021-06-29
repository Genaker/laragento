<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductLink
 * 
 * @property int $link_id
 * @property int $product_id
 * @property int $linked_product_id
 * @property int $link_type_id
 * 
 * @property CatalogProductEntity $catalog_product_entity
 * @property CatalogProductLinkType $catalog_product_link_type
 * @property Collection|CatalogProductLinkAttributeDecimal[] $catalog_product_link_attribute_decimals
 * @property Collection|CatalogProductLinkAttributeInt[] $catalog_product_link_attribute_ints
 * @property Collection|CatalogProductLinkAttributeVarchar[] $catalog_product_link_attribute_varchars
 *
 * @package Laragento\Models
 */
class CatalogProductLink extends Model
{
	protected $table = 'catalog_product_link';
	protected $primaryKey = 'link_id';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'linked_product_id' => 'int',
		'link_type_id' => 'int'
	];

	protected $fillable = [
		'product_id',
		'linked_product_id',
		'link_type_id'
	];

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'linked_product_id');
	}

	public function catalog_product_link_type()
	{
		return $this->belongsTo(CatalogProductLinkType::class, 'link_type_id');
	}

	public function catalog_product_link_attribute_decimals()
	{
		return $this->hasMany(CatalogProductLinkAttributeDecimal::class, 'link_id');
	}

	public function catalog_product_link_attribute_ints()
	{
		return $this->hasMany(CatalogProductLinkAttributeInt::class, 'link_id');
	}

	public function catalog_product_link_attribute_varchars()
	{
		return $this->hasMany(CatalogProductLinkAttributeVarchar::class, 'link_id');
	}
}
