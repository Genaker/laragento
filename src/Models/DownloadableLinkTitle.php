<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DownloadableLinkTitle
 * 
 * @property int $title_id
 * @property int $link_id
 * @property int $store_id
 * @property string|null $title
 * 
 * @property DownloadableLink $downloadable_link
 * @property Store $store
 *
 * @package Laragento\Models
 */
class DownloadableLinkTitle extends Model
{
	protected $table = 'downloadable_link_title';
	protected $primaryKey = 'title_id';
	public $timestamps = false;

	protected $casts = [
		'link_id' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'link_id',
		'store_id',
		'title'
	];

	public function downloadable_link()
	{
		return $this->belongsTo(DownloadableLink::class, 'link_id');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
