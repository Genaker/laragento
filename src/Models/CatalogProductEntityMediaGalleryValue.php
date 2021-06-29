<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductEntityMediaGalleryValue
 * 
 * @property int $value_id
 * @property int $store_id
 * @property int $entity_id
 * @property string|null $label
 * @property int|null $position
 * @property int $disabled
 * @property int $record_id
 * 
 * @property CatalogProductEntity $catalog_product_entity
 * @property Store $store
 * @property CatalogProductEntityMediaGallery $catalog_product_entity_media_gallery
 *
 * @package Laragento\Models
 */
class CatalogProductEntityMediaGalleryValue extends Model
{
	protected $table = 'catalog_product_entity_media_gallery_value';
	protected $primaryKey = 'record_id';
	public $timestamps = false;

	protected $casts = [
		'value_id' => 'int',
		'store_id' => 'int',
		'entity_id' => 'int',
		'position' => 'int',
		'disabled' => 'int'
	];

	protected $fillable = [
		'value_id',
		'store_id',
		'entity_id',
		'label',
		'position',
		'disabled'
	];

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'entity_id');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function catalog_product_entity_media_gallery()
	{
		return $this->belongsTo(CatalogProductEntityMediaGallery::class, 'value_id');
	}
}
