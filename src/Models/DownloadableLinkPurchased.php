<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DownloadableLinkPurchased
 * 
 * @property int $purchased_id
 * @property int|null $order_id
 * @property string|null $order_increment_id
 * @property int $order_item_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int|null $customer_id
 * @property string|null $product_name
 * @property string|null $product_sku
 * @property string|null $link_section_title
 * 
 * @property CustomerEntity|null $customer_entity
 * @property SalesOrder|null $sales_order
 * @property Collection|DownloadableLinkPurchasedItem[] $downloadable_link_purchased_items
 *
 * @package Laragento\Models
 */
class DownloadableLinkPurchased extends Model
{
	protected $table = 'downloadable_link_purchased';
	protected $primaryKey = 'purchased_id';

	protected $casts = [
		'order_id' => 'int',
		'order_item_id' => 'int',
		'customer_id' => 'int'
	];

	protected $fillable = [
		'order_id',
		'order_increment_id',
		'order_item_id',
		'customer_id',
		'product_name',
		'product_sku',
		'link_section_title'
	];

	public function customer_entity()
	{
		return $this->belongsTo(CustomerEntity::class, 'customer_id');
	}

	public function sales_order()
	{
		return $this->belongsTo(SalesOrder::class, 'order_id');
	}

	public function downloadable_link_purchased_items()
	{
		return $this->hasMany(DownloadableLinkPurchasedItem::class, 'purchased_id');
	}
}
