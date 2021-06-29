<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class WeeeTax
 * 
 * @property int $value_id
 * @property int $website_id
 * @property int $entity_id
 * @property string|null $country
 * @property float $value
 * @property int $state
 * @property int $attribute_id
 * 
 * @property EavAttribute $eav_attribute
 * @property DirectoryCountry|null $directory_country
 * @property CatalogProductEntity $catalog_product_entity
 * @property StoreWebsite $store_website
 *
 * @package Laragento\Models
 */
class WeeeTax extends Model
{
	protected $table = 'weee_tax';
	protected $primaryKey = 'value_id';
	public $timestamps = false;

	protected $casts = [
		'website_id' => 'int',
		'entity_id' => 'int',
		'value' => 'float',
		'state' => 'int',
		'attribute_id' => 'int'
	];

	protected $fillable = [
		'website_id',
		'entity_id',
		'country',
		'value',
		'state',
		'attribute_id'
	];

	public function eav_attribute()
	{
		return $this->belongsTo(EavAttribute::class, 'attribute_id');
	}

	public function directory_country()
	{
		return $this->belongsTo(DirectoryCountry::class, 'country');
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
