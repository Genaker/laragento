<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductRelation
 * 
 * @property int $parent_id
 * @property int $child_id
 * 
 * @property CatalogProductEntity $catalog_product_entity
 *
 * @package Laragento\Models
 */
class CatalogProductRelation extends Model
{
	protected $table = 'catalog_product_relation';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'parent_id' => 'int',
		'child_id' => 'int'
	];

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'parent_id');
	}
}
