<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogCategoryEntityVarchar
 * 
 * @property int $value_id
 * @property int $attribute_id
 * @property int $store_id
 * @property int $entity_id
 * @property string|null $value
 * 
 * @property Store $store
 * @property EavAttribute $eav_attribute
 * @property CatalogCategoryEntity $catalog_category_entity
 *
 * @package Laragento\Models
 */
class CatalogCategoryEntityVarchar extends Model
{
	protected $table = 'catalog_category_entity_varchar';
	protected $primaryKey = 'value_id';
	public $timestamps = false;

	protected $casts = [
		'attribute_id' => 'int',
		'store_id' => 'int',
		'entity_id' => 'int'
	];

	protected $fillable = [
		'attribute_id',
		'store_id',
		'entity_id',
		'value'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function eav_attribute()
	{
		return $this->belongsTo(EavAttribute::class, 'attribute_id');
	}

	public function catalog_category_entity()
	{
		return $this->belongsTo(CatalogCategoryEntity::class, 'entity_id');
	}
}
