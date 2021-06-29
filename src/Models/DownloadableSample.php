<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DownloadableSample
 * 
 * @property int $sample_id
 * @property int $product_id
 * @property string|null $sample_url
 * @property string|null $sample_file
 * @property string|null $sample_type
 * @property int $sort_order
 * 
 * @property CatalogProductEntity $catalog_product_entity
 * @property Collection|DownloadableSampleTitle[] $downloadable_sample_titles
 *
 * @package Laragento\Models
 */
class DownloadableSample extends Model
{
	protected $table = 'downloadable_sample';
	protected $primaryKey = 'sample_id';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'sort_order' => 'int'
	];

	protected $fillable = [
		'product_id',
		'sample_url',
		'sample_file',
		'sample_type',
		'sort_order'
	];

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'product_id');
	}

	public function downloadable_sample_titles()
	{
		return $this->hasMany(DownloadableSampleTitle::class, 'sample_id');
	}
}
