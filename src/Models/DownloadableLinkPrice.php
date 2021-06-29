<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DownloadableLinkPrice
 * 
 * @property int $price_id
 * @property int $link_id
 * @property int $website_id
 * @property float $price
 * 
 * @property DownloadableLink $downloadable_link
 * @property StoreWebsite $store_website
 *
 * @package Laragento\Models
 */
class DownloadableLinkPrice extends Model
{
	protected $table = 'downloadable_link_price';
	protected $primaryKey = 'price_id';
	public $timestamps = false;

	protected $casts = [
		'link_id' => 'int',
		'website_id' => 'int',
		'price' => 'float'
	];

	protected $fillable = [
		'link_id',
		'website_id',
		'price'
	];

	public function downloadable_link()
	{
		return $this->belongsTo(DownloadableLink::class, 'link_id');
	}

	public function store_website()
	{
		return $this->belongsTo(StoreWebsite::class, 'website_id');
	}
}
