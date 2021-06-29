<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReportComparedProductIndex
 * 
 * @property int $index_id
 * @property int|null $visitor_id
 * @property int|null $customer_id
 * @property int $product_id
 * @property int|null $store_id
 * @property Carbon $added_at
 * 
 * @property CustomerEntity|null $customer_entity
 * @property CatalogProductEntity $catalog_product_entity
 * @property Store|null $store
 *
 * @package Laragento\Models
 */
class ReportComparedProductIndex extends Model
{
	protected $table = 'report_compared_product_index';
	protected $primaryKey = 'index_id';
	public $timestamps = false;

	protected $casts = [
		'visitor_id' => 'int',
		'customer_id' => 'int',
		'product_id' => 'int',
		'store_id' => 'int'
	];

	protected $dates = [
		'added_at'
	];

	protected $fillable = [
		'visitor_id',
		'customer_id',
		'product_id',
		'store_id',
		'added_at'
	];

	public function customer_entity()
	{
		return $this->belongsTo(CustomerEntity::class, 'customer_id');
	}

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'product_id');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
