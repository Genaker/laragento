<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductEntityMediaGalleryValueToEntity
 * 
 * @property int $value_id
 * @property int $entity_id
 * 
 * @property CatalogProductEntity $catalog_product_entity
 * @property CatalogProductEntityMediaGallery $catalog_product_entity_media_gallery
 *
 * @package Laragento\Models
 */
class CatalogProductEntityMediaGalleryValueToEntity extends Model
{
	protected $table = 'catalog_product_entity_media_gallery_value_to_entity';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'value_id' => 'int',
		'entity_id' => 'int'
	];

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'entity_id');
	}

	public function catalog_product_entity_media_gallery()
	{
		return $this->belongsTo(CatalogProductEntityMediaGallery::class, 'value_id');
	}
}
