<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReportViewedProductAggregatedMonthly
 * 
 * @property int $id
 * @property Carbon|null $period
 * @property int|null $store_id
 * @property int|null $product_id
 * @property string|null $product_name
 * @property float $product_price
 * @property int $views_num
 * @property int $rating_pos
 * 
 * @property CatalogProductEntity|null $catalog_product_entity
 * @property Store|null $store
 *
 * @package Laragento\Models
 */
class ReportViewedProductAggregatedMonthly extends Model
{
	protected $table = 'report_viewed_product_aggregated_monthly';
	public $timestamps = false;

	protected $casts = [
		'store_id' => 'int',
		'product_id' => 'int',
		'product_price' => 'float',
		'views_num' => 'int',
		'rating_pos' => 'int'
	];

	protected $dates = [
		'period'
	];

	protected $fillable = [
		'period',
		'store_id',
		'product_id',
		'product_name',
		'product_price',
		'views_num',
		'rating_pos'
	];

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'product_id');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
