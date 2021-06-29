<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sitemap
 * 
 * @property int $sitemap_id
 * @property string|null $sitemap_type
 * @property string|null $sitemap_filename
 * @property string|null $sitemap_path
 * @property Carbon|null $sitemap_time
 * @property int $store_id
 * 
 * @property Store $store
 *
 * @package Laragento\Models
 */
class Sitemap extends Model
{
	protected $table = 'sitemap';
	protected $primaryKey = 'sitemap_id';
	public $timestamps = false;

	protected $casts = [
		'store_id' => 'int'
	];

	protected $dates = [
		'sitemap_time'
	];

	protected $fillable = [
		'sitemap_type',
		'sitemap_filename',
		'sitemap_path',
		'sitemap_time',
		'store_id'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
