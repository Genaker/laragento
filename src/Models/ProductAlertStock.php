<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductAlertStock
 * 
 * @property int $alert_stock_id
 * @property int $customer_id
 * @property int $product_id
 * @property int $website_id
 * @property int|null $store_id
 * @property Carbon $add_date
 * @property Carbon|null $send_date
 * @property int $send_count
 * @property int $status
 * 
 * @property CustomerEntity $customer_entity
 * @property CatalogProductEntity $catalog_product_entity
 * @property Store|null $store
 * @property StoreWebsite $store_website
 *
 * @package Laragento\Models
 */
class ProductAlertStock extends Model
{
	protected $table = 'product_alert_stock';
	protected $primaryKey = 'alert_stock_id';
	public $timestamps = false;

	protected $casts = [
		'customer_id' => 'int',
		'product_id' => 'int',
		'website_id' => 'int',
		'store_id' => 'int',
		'send_count' => 'int',
		'status' => 'int'
	];

	protected $dates = [
		'add_date',
		'send_date'
	];

	protected $fillable = [
		'customer_id',
		'product_id',
		'website_id',
		'store_id',
		'add_date',
		'send_date',
		'send_count',
		'status'
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

	public function store_website()
	{
		return $this->belongsTo(StoreWebsite::class, 'website_id');
	}
}
