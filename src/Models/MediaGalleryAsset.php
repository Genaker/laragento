<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MediaGalleryAsset
 * 
 * @property int $id
 * @property string|null $path
 * @property string|null $title
 * @property string|null $description
 * @property string|null $source
 * @property string|null $hash
 * @property string|null $content_type
 * @property int $width
 * @property int $height
 * @property int $size
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|MediaGalleryAssetKeyword[] $media_gallery_asset_keywords
 *
 * @package Laragento\Models
 */
class MediaGalleryAsset extends Model
{
	protected $table = 'media_gallery_asset';

	protected $casts = [
		'width' => 'int',
		'height' => 'int',
		'size' => 'int'
	];

	protected $fillable = [
		'path',
		'title',
		'description',
		'source',
		'hash',
		'content_type',
		'width',
		'height',
		'size'
	];

	public function media_gallery_asset_keywords()
	{
		return $this->hasMany(MediaGalleryAssetKeyword::class, 'asset_id');
	}
}
