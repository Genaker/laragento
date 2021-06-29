<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MediaGalleryAssetKeyword
 * 
 * @property int $keyword_id
 * @property int $asset_id
 * 
 * @property MediaGalleryAsset $media_gallery_asset
 * @property MediaGalleryKeyword $media_gallery_keyword
 *
 * @package Laragento\Models
 */
class MediaGalleryAssetKeyword extends Model
{
	protected $table = 'media_gallery_asset_keyword';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'keyword_id' => 'int',
		'asset_id' => 'int'
	];

	public function media_gallery_asset()
	{
		return $this->belongsTo(MediaGalleryAsset::class, 'asset_id');
	}

	public function media_gallery_keyword()
	{
		return $this->belongsTo(MediaGalleryKeyword::class, 'keyword_id');
	}
}
