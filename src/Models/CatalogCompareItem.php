<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogCompareItem
 * 
 * @property int $catalog_compare_item_id
 * @property int $visitor_id
 * @property int|null $customer_id
 * @property int $product_id
 * @property int|null $store_id
 * @property int|null $list_id
 * 
 * @property CustomerEntity|null $customer_entity
 * @property CatalogCompareList|null $catalog_compare_list
 * @property CatalogProductEntity $catalog_product_entity
 * @property Store|null $store
 *
 * @package Laragento\Models
 */
class CatalogCompareItem extends Model
{
	protected $table = 'catalog_compare_item';
	protected $primaryKey = 'catalog_compare_item_id';
	public $timestamps = false;

	protected $casts = [
		'visitor_id' => 'int',
		'customer_id' => 'int',
		'product_id' => 'int',
		'store_id' => 'int',
		'list_id' => 'int'
	];

	protected $fillable = [
		'visitor_id',
		'customer_id',
		'product_id',
		'store_id',
		'list_id'
	];

	public function customer_entity()
	{
		return $this->belongsTo(CustomerEntity::class, 'customer_id');
	}

	public function catalog_compare_list()
	{
		return $this->belongsTo(CatalogCompareList::class, 'list_id');
	}

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'product_id');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
