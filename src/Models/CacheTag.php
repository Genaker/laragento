<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CacheTag
 * 
 * @property string $tag
 * @property string $cache_id
 *
 * @package Laragento\Models
 */
class CacheTag extends Model
{
	protected $table = 'cache_tag';
	public $incrementing = false;
	public $timestamps = false;
}
