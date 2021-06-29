<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerGroup
 * 
 * @property int $customer_group_id
 * @property string $customer_group_code
 * @property int $tax_class_id
 * 
 * @property Collection|CatalogProductBundlePriceIndex[] $catalog_product_bundle_price_indices
 * @property Collection|CatalogProductEntityTierPrice[] $catalog_product_entity_tier_prices
 * @property Collection|CatalogProductIndexTierPrice[] $catalog_product_index_tier_prices
 * @property Collection|Catalogrule[] $catalogrules
 * @property Collection|Salesrule[] $salesrules
 * @property Collection|SalesruleProductAttribute[] $salesrule_product_attributes
 *
 * @package Laragento\Models
 */
class CustomerGroup extends Model
{
	protected $table = 'customer_group';
	protected $primaryKey = 'customer_group_id';
	public $timestamps = false;

	protected $casts = [
		'tax_class_id' => 'int'
	];

	protected $fillable = [
		'customer_group_code',
		'tax_class_id'
	];

	public function catalog_product_bundle_price_indices()
	{
		return $this->hasMany(CatalogProductBundlePriceIndex::class);
	}

	public function catalog_product_entity_tier_prices()
	{
		return $this->hasMany(CatalogProductEntityTierPrice::class);
	}

	public function catalog_product_index_tier_prices()
	{
		return $this->hasMany(CatalogProductIndexTierPrice::class);
	}

	public function catalogrules()
	{
		return $this->belongsToMany(Catalogrule::class, 'catalogrule_customer_group', 'customer_group_id', 'rule_id');
	}

	public function salesrules()
	{
		return $this->belongsToMany(Salesrule::class, 'salesrule_customer_group', 'customer_group_id', 'rule_id');
	}

	public function salesrule_product_attributes()
	{
		return $this->hasMany(SalesruleProductAttribute::class);
	}
}
