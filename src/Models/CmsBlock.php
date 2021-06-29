<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CmsBlock
 * 
 * @property int $block_id
 * @property string $title
 * @property string $identifier
 * @property string|null $content
 * @property Carbon $creation_time
 * @property Carbon $update_time
 * @property int $is_active
 * 
 * @property Collection|Store[] $stores
 *
 * @package Laragento\Models
 */
class CmsBlock extends Model
{
	protected $table = 'cms_block';
	protected $primaryKey = 'block_id';
	public $timestamps = false;

	protected $casts = [
		'is_active' => 'int'
	];

	protected $dates = [
		'creation_time',
		'update_time'
	];

	protected $fillable = [
		'title',
		'identifier',
		'content',
		'creation_time',
		'update_time',
		'is_active'
	];

	public function stores()
	{
		return $this->belongsToMany(Store::class, 'cms_block_store', 'block_id');
	}
}
