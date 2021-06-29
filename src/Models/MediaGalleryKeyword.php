<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MediaGalleryKeyword
 * 
 * @property int $id
 * @property string $keyword
 * 
 * @property Collection|MediaGalleryAssetKeyword[] $media_gallery_asset_keywords
 *
 * @package Laragento\Models
 */
class MediaGalleryKeyword extends Model
{
	protected $table = 'media_gallery_keyword';
	public $timestamps = false;

	protected $fillable = [
		'keyword'
	];

	public function media_gallery_asset_keywords()
	{
		return $this->hasMany(MediaGalleryAssetKeyword::class, 'keyword_id');
	}
}
