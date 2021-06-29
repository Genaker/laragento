<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductSuperLink
 * 
 * @property int $link_id
 * @property int $product_id
 * @property int $parent_id
 * 
 * @property CatalogProductEntity $catalog_product_entity
 *
 * @package Laragento\Models
 */
class CatalogProductSuperLink extends Model
{
	protected $table = 'catalog_product_super_link';
	protected $primaryKey = 'link_id';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'parent_id' => 'int'
	];

	protected $fillable = [
		'product_id',
		'parent_id'
	];

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'product_id');
	}
}
