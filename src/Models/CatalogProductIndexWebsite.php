<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductIndexWebsite
 * 
 * @property int $website_id
 * @property int $default_store_id
 * @property Carbon|null $website_date
 * @property float|null $rate
 * 
 * @property StoreWebsite $store_website
 *
 * @package Laragento\Models
 */
class CatalogProductIndexWebsite extends Model
{
	protected $table = 'catalog_product_index_website';
	protected $primaryKey = 'website_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'website_id' => 'int',
		'default_store_id' => 'int',
		'rate' => 'float'
	];

	protected $dates = [
		'website_date'
	];

	protected $fillable = [
		'default_store_id',
		'website_date',
		'rate'
	];

	public function store_website()
	{
		return $this->belongsTo(StoreWebsite::class, 'website_id');
	}
}
