<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductEntityTierPrice
 * 
 * @property int $value_id
 * @property int $entity_id
 * @property int $all_groups
 * @property int $customer_group_id
 * @property float $qty
 * @property float $value
 * @property int $website_id
 * @property float|null $percentage_value
 * 
 * @property CustomerGroup $customer_group
 * @property CatalogProductEntity $catalog_product_entity
 * @property StoreWebsite $store_website
 *
 * @package Laragento\Models
 */
class CatalogProductEntityTierPrice extends Model
{
	protected $table = 'catalog_product_entity_tier_price';
	protected $primaryKey = 'value_id';
	public $timestamps = false;

	protected $casts = [
		'entity_id' => 'int',
		'all_groups' => 'int',
		'customer_group_id' => 'int',
		'qty' => 'float',
		'value' => 'float',
		'website_id' => 'int',
		'percentage_value' => 'float'
	];

	protected $fillable = [
		'entity_id',
		'all_groups',
		'customer_group_id',
		'qty',
		'value',
		'website_id',
		'percentage_value'
	];

	public function customer_group()
	{
		return $this->belongsTo(CustomerGroup::class);
	}

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'entity_id');
	}

	public function store_website()
	{
		return $this->belongsTo(StoreWebsite::class, 'website_id');
	}
}
