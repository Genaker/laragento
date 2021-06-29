<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CmsBlockStore
 * 
 * @property int $block_id
 * @property int $store_id
 * 
 * @property CmsBlock $cms_block
 * @property Store $store
 *
 * @package Laragento\Models
 */
class CmsBlockStore extends Model
{
	protected $table = 'cms_block_store';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'block_id' => 'int',
		'store_id' => 'int'
	];

	public function cms_block()
	{
		return $this->belongsTo(CmsBlock::class, 'block_id');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
