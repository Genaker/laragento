<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductLinkAttribute
 * 
 * @property int $product_link_attribute_id
 * @property int $link_type_id
 * @property string|null $product_link_attribute_code
 * @property string|null $data_type
 * 
 * @property CatalogProductLinkType $catalog_product_link_type
 * @property Collection|CatalogProductLinkAttributeDecimal[] $catalog_product_link_attribute_decimals
 * @property Collection|CatalogProductLinkAttributeInt[] $catalog_product_link_attribute_ints
 * @property Collection|CatalogProductLinkAttributeVarchar[] $catalog_product_link_attribute_varchars
 *
 * @package Laragento\Models
 */
class CatalogProductLinkAttribute extends Model
{
	protected $table = 'catalog_product_link_attribute';
	protected $primaryKey = 'product_link_attribute_id';
	public $timestamps = false;

	protected $casts = [
		'link_type_id' => 'int'
	];

	protected $fillable = [
		'link_type_id',
		'product_link_attribute_code',
		'data_type'
	];

	public function catalog_product_link_type()
	{
		return $this->belongsTo(CatalogProductLinkType::class, 'link_type_id');
	}

	public function catalog_product_link_attribute_decimals()
	{
		return $this->hasMany(CatalogProductLinkAttributeDecimal::class, 'product_link_attribute_id');
	}

	public function catalog_product_link_attribute_ints()
	{
		return $this->hasMany(CatalogProductLinkAttributeInt::class, 'product_link_attribute_id');
	}

	public function catalog_product_link_attribute_varchars()
	{
		return $this->hasMany(CatalogProductLinkAttributeVarchar::class, 'product_link_attribute_id');
	}
}
