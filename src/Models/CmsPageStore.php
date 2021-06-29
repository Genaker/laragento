<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CmsPageStore
 * 
 * @property int $page_id
 * @property int $store_id
 * 
 * @property CmsPage $cms_page
 * @property Store $store
 *
 * @package Laragento\Models
 */
class CmsPageStore extends Model
{
	protected $table = 'cms_page_store';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'page_id' => 'int',
		'store_id' => 'int'
	];

	public function cms_page()
	{
		return $this->belongsTo(CmsPage::class, 'page_id');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
