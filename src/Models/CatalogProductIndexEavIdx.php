<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductIndexEavIdx
 * 
 * @property int $entity_id
 * @property int $attribute_id
 * @property int $store_id
 * @property int $value
 * @property int $source_id
 *
 * @package Laragento\Models
 */
class CatalogProductIndexEavIdx extends Model
{
	protected $table = 'catalog_product_index_eav_idx';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'entity_id' => 'int',
		'attribute_id' => 'int',
		'store_id' => 'int',
		'value' => 'int',
		'source_id' => 'int'
	];
}
