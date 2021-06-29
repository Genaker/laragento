<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductEntityMediaGallery
 * 
 * @property int $value_id
 * @property int $attribute_id
 * @property string|null $value
 * @property string $media_type
 * @property int $disabled
 * 
 * @property EavAttribute $eav_attribute
 * @property Collection|CatalogProductEntityMediaGalleryValue[] $catalog_product_entity_media_gallery_values
 * @property Collection|CatalogProductEntityMediaGalleryValueToEntity[] $catalog_product_entity_media_gallery_value_to_entities
 * @property Collection|CatalogProductEntityMediaGalleryValueVideo[] $catalog_product_entity_media_gallery_value_videos
 *
 * @package Laragento\Models
 */
class CatalogProductEntityMediaGallery extends Model
{
	protected $table = 'catalog_product_entity_media_gallery';
	protected $primaryKey = 'value_id';
	public $timestamps = false;

	protected $casts = [
		'attribute_id' => 'int',
		'disabled' => 'int'
	];

	protected $fillable = [
		'attribute_id',
		'value',
		'media_type',
		'disabled'
	];

	public function eav_attribute()
	{
		return $this->belongsTo(EavAttribute::class, 'attribute_id');
	}

	public function catalog_product_entity_media_gallery_values()
	{
		return $this->hasMany(CatalogProductEntityMediaGalleryValue::class, 'value_id');
	}

	public function catalog_product_entity_media_gallery_value_to_entities()
	{
		return $this->hasMany(CatalogProductEntityMediaGalleryValueToEntity::class, 'value_id');
	}

	public function catalog_product_entity_media_gallery_value_videos()
	{
		return $this->hasMany(CatalogProductEntityMediaGalleryValueVideo::class, 'value_id');
	}
}
