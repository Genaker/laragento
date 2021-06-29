<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DownloadableLinkPurchasedItem
 * 
 * @property int $item_id
 * @property int $purchased_id
 * @property int|null $order_item_id
 * @property int|null $product_id
 * @property string|null $link_hash
 * @property int $number_of_downloads_bought
 * @property int $number_of_downloads_used
 * @property int $link_id
 * @property string|null $link_title
 * @property int $is_shareable
 * @property string|null $link_url
 * @property string|null $link_file
 * @property string|null $link_type
 * @property string|null $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property SalesOrderItem|null $sales_order_item
 * @property DownloadableLinkPurchased $downloadable_link_purchased
 *
 * @package Laragento\Models
 */
class DownloadableLinkPurchasedItem extends Model
{
	protected $table = 'downloadable_link_purchased_item';
	protected $primaryKey = 'item_id';

	protected $casts = [
		'purchased_id' => 'int',
		'order_item_id' => 'int',
		'product_id' => 'int',
		'number_of_downloads_bought' => 'int',
		'number_of_downloads_used' => 'int',
		'link_id' => 'int',
		'is_shareable' => 'int'
	];

	protected $fillable = [
		'purchased_id',
		'order_item_id',
		'product_id',
		'link_hash',
		'number_of_downloads_bought',
		'number_of_downloads_used',
		'link_id',
		'link_title',
		'is_shareable',
		'link_url',
		'link_file',
		'link_type',
		'status'
	];

	public function sales_order_item()
	{
		return $this->belongsTo(SalesOrderItem::class, 'order_item_id');
	}

	public function downloadable_link_purchased()
	{
		return $this->belongsTo(DownloadableLinkPurchased::class, 'purchased_id');
	}
}
