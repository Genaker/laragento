<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DownloadableLink
 * 
 * @property int $link_id
 * @property int $product_id
 * @property int $sort_order
 * @property int|null $number_of_downloads
 * @property int $is_shareable
 * @property string|null $link_url
 * @property string|null $link_file
 * @property string|null $link_type
 * @property string|null $sample_url
 * @property string|null $sample_file
 * @property string|null $sample_type
 * 
 * @property CatalogProductEntity $catalog_product_entity
 * @property Collection|DownloadableLinkPrice[] $downloadable_link_prices
 * @property Collection|DownloadableLinkTitle[] $downloadable_link_titles
 *
 * @package Laragento\Models
 */
class DownloadableLink extends Model
{
	protected $table = 'downloadable_link';
	protected $primaryKey = 'link_id';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'sort_order' => 'int',
		'number_of_downloads' => 'int',
		'is_shareable' => 'int'
	];

	protected $fillable = [
		'product_id',
		'sort_order',
		'number_of_downloads',
		'is_shareable',
		'link_url',
		'link_file',
		'link_type',
		'sample_url',
		'sample_file',
		'sample_type'
	];

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'product_id');
	}

	public function downloadable_link_prices()
	{
		return $this->hasMany(DownloadableLinkPrice::class, 'link_id');
	}

	public function downloadable_link_titles()
	{
		return $this->hasMany(DownloadableLinkTitle::class, 'link_id');
	}
}
