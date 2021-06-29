<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductEntityMediaGalleryValueVideo
 * 
 * @property int $value_id
 * @property int $store_id
 * @property string|null $provider
 * @property string|null $url
 * @property string|null $title
 * @property string|null $description
 * @property string|null $metadata
 * 
 * @property Store $store
 * @property CatalogProductEntityMediaGallery $catalog_product_entity_media_gallery
 *
 * @package Laragento\Models
 */
class CatalogProductEntityMediaGalleryValueVideo extends Model
{
	protected $table = 'catalog_product_entity_media_gallery_value_video';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'value_id' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'provider',
		'url',
		'title',
		'description',
		'metadata'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function catalog_product_entity_media_gallery()
	{
		return $this->belongsTo(CatalogProductEntityMediaGallery::class, 'value_id');
	}
}
