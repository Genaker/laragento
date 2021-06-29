<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogCompareList
 * 
 * @property int $list_id
 * @property string|null $list_id_mask
 * @property int|null $customer_id
 * 
 * @property CustomerEntity|null $customer_entity
 * @property Collection|CatalogCompareItem[] $catalog_compare_items
 *
 * @package Laragento\Models
 */
class CatalogCompareList extends Model
{
	protected $table = 'catalog_compare_list';
	protected $primaryKey = 'list_id';
	public $timestamps = false;

	protected $casts = [
		'customer_id' => 'int'
	];

	protected $fillable = [
		'list_id_mask',
		'customer_id'
	];

	public function customer_entity()
	{
		return $this->belongsTo(CustomerEntity::class, 'customer_id');
	}

	public function catalog_compare_items()
	{
		return $this->hasMany(CatalogCompareItem::class, 'list_id');
	}
}
