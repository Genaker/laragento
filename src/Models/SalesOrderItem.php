<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesOrderItem
 * 
 * @property int $item_id
 * @property int $order_id
 * @property int|null $parent_item_id
 * @property int|null $quote_item_id
 * @property int|null $store_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int|null $product_id
 * @property string|null $product_type
 * @property string|null $product_options
 * @property float|null $weight
 * @property int|null $is_virtual
 * @property string|null $sku
 * @property string|null $name
 * @property string|null $description
 * @property string|null $applied_rule_ids
 * @property string|null $additional_data
 * @property int|null $is_qty_decimal
 * @property int $no_discount
 * @property float|null $qty_backordered
 * @property float|null $qty_canceled
 * @property float|null $qty_invoiced
 * @property float|null $qty_ordered
 * @property float|null $qty_refunded
 * @property float|null $qty_shipped
 * @property float|null $base_cost
 * @property float $price
 * @property float $base_price
 * @property float|null $original_price
 * @property float|null $base_original_price
 * @property float|null $tax_percent
 * @property float|null $tax_amount
 * @property float|null $base_tax_amount
 * @property float|null $tax_invoiced
 * @property float|null $base_tax_invoiced
 * @property float|null $discount_percent
 * @property float|null $discount_amount
 * @property float|null $base_discount_amount
 * @property float|null $discount_invoiced
 * @property float|null $base_discount_invoiced
 * @property float|null $amount_refunded
 * @property float|null $base_amount_refunded
 * @property float $row_total
 * @property float $base_row_total
 * @property float $row_invoiced
 * @property float $base_row_invoiced
 * @property float|null $row_weight
 * @property float|null $base_tax_before_discount
 * @property float|null $tax_before_discount
 * @property string|null $ext_order_item_id
 * @property int|null $locked_do_invoice
 * @property int|null $locked_do_ship
 * @property float|null $price_incl_tax
 * @property float|null $base_price_incl_tax
 * @property float|null $row_total_incl_tax
 * @property float|null $base_row_total_incl_tax
 * @property float|null $discount_tax_compensation_amount
 * @property float|null $base_discount_tax_compensation_amount
 * @property float|null $discount_tax_compensation_invoiced
 * @property float|null $base_discount_tax_compensation_invoiced
 * @property float|null $discount_tax_compensation_refunded
 * @property float|null $base_discount_tax_compensation_refunded
 * @property float|null $tax_canceled
 * @property float|null $discount_tax_compensation_canceled
 * @property float|null $tax_refunded
 * @property float|null $base_tax_refunded
 * @property float|null $discount_refunded
 * @property float|null $base_discount_refunded
 * @property int|null $gift_message_id
 * @property int|null $gift_message_available
 * @property int $free_shipping
 * @property string|null $weee_tax_applied
 * @property float|null $weee_tax_applied_amount
 * @property float|null $weee_tax_applied_row_amount
 * @property float|null $weee_tax_disposition
 * @property float|null $weee_tax_row_disposition
 * @property float|null $base_weee_tax_applied_amount
 * @property float|null $base_weee_tax_applied_row_amnt
 * @property float|null $base_weee_tax_disposition
 * @property float|null $base_weee_tax_row_disposition
 * 
 * @property SalesOrder $sales_order
 * @property Store|null $store
 * @property Collection|DownloadableLinkPurchasedItem[] $downloadable_link_purchased_items
 * @property Collection|SalesOrderTaxItem[] $sales_order_tax_items
 *
 * @package Laragento\Models
 */
class SalesOrderItem extends Model
{
	protected $table = 'sales_order_item';
	protected $primaryKey = 'item_id';

	protected $casts = [
		'order_id' => 'int',
		'parent_item_id' => 'int',
		'quote_item_id' => 'int',
		'store_id' => 'int',
		'product_id' => 'int',
		'weight' => 'float',
		'is_virtual' => 'int',
		'is_qty_decimal' => 'int',
		'no_discount' => 'int',
		'qty_backordered' => 'float',
		'qty_canceled' => 'float',
		'qty_invoiced' => 'float',
		'qty_ordered' => 'float',
		'qty_refunded' => 'float',
		'qty_shipped' => 'float',
		'base_cost' => 'float',
		'price' => 'float',
		'base_price' => 'float',
		'original_price' => 'float',
		'base_original_price' => 'float',
		'tax_percent' => 'float',
		'tax_amount' => 'float',
		'base_tax_amount' => 'float',
		'tax_invoiced' => 'float',
		'base_tax_invoiced' => 'float',
		'discount_percent' => 'float',
		'discount_amount' => 'float',
		'base_discount_amount' => 'float',
		'discount_invoiced' => 'float',
		'base_discount_invoiced' => 'float',
		'amount_refunded' => 'float',
		'base_amount_refunded' => 'float',
		'row_total' => 'float',
		'base_row_total' => 'float',
		'row_invoiced' => 'float',
		'base_row_invoiced' => 'float',
		'row_weight' => 'float',
		'base_tax_before_discount' => 'float',
		'tax_before_discount' => 'float',
		'locked_do_invoice' => 'int',
		'locked_do_ship' => 'int',
		'price_incl_tax' => 'float',
		'base_price_incl_tax' => 'float',
		'row_total_incl_tax' => 'float',
		'base_row_total_incl_tax' => 'float',
		'discount_tax_compensation_amount' => 'float',
		'base_discount_tax_compensation_amount' => 'float',
		'discount_tax_compensation_invoiced' => 'float',
		'base_discount_tax_compensation_invoiced' => 'float',
		'discount_tax_compensation_refunded' => 'float',
		'base_discount_tax_compensation_refunded' => 'float',
		'tax_canceled' => 'float',
		'discount_tax_compensation_canceled' => 'float',
		'tax_refunded' => 'float',
		'base_tax_refunded' => 'float',
		'discount_refunded' => 'float',
		'base_discount_refunded' => 'float',
		'gift_message_id' => 'int',
		'gift_message_available' => 'int',
		'free_shipping' => 'int',
		'weee_tax_applied_amount' => 'float',
		'weee_tax_applied_row_amount' => 'float',
		'weee_tax_disposition' => 'float',
		'weee_tax_row_disposition' => 'float',
		'base_weee_tax_applied_amount' => 'float',
		'base_weee_tax_applied_row_amnt' => 'float',
		'base_weee_tax_disposition' => 'float',
		'base_weee_tax_row_disposition' => 'float'
	];

	protected $fillable = [
		'order_id',
		'parent_item_id',
		'quote_item_id',
		'store_id',
		'product_id',
		'product_type',
		'product_options',
		'weight',
		'is_virtual',
		'sku',
		'name',
		'description',
		'applied_rule_ids',
		'additional_data',
		'is_qty_decimal',
		'no_discount',
		'qty_backordered',
		'qty_canceled',
		'qty_invoiced',
		'qty_ordered',
		'qty_refunded',
		'qty_shipped',
		'base_cost',
		'price',
		'base_price',
		'original_price',
		'base_original_price',
		'tax_percent',
		'tax_amount',
		'base_tax_amount',
		'tax_invoiced',
		'base_tax_invoiced',
		'discount_percent',
		'discount_amount',
		'base_discount_amount',
		'discount_invoiced',
		'base_discount_invoiced',
		'amount_refunded',
		'base_amount_refunded',
		'row_total',
		'base_row_total',
		'row_invoiced',
		'base_row_invoiced',
		'row_weight',
		'base_tax_before_discount',
		'tax_before_discount',
		'ext_order_item_id',
		'locked_do_invoice',
		'locked_do_ship',
		'price_incl_tax',
		'base_price_incl_tax',
		'row_total_incl_tax',
		'base_row_total_incl_tax',
		'discount_tax_compensation_amount',
		'base_discount_tax_compensation_amount',
		'discount_tax_compensation_invoiced',
		'base_discount_tax_compensation_invoiced',
		'discount_tax_compensation_refunded',
		'base_discount_tax_compensation_refunded',
		'tax_canceled',
		'discount_tax_compensation_canceled',
		'tax_refunded',
		'base_tax_refunded',
		'discount_refunded',
		'base_discount_refunded',
		'gift_message_id',
		'gift_message_available',
		'free_shipping',
		'weee_tax_applied',
		'weee_tax_applied_amount',
		'weee_tax_applied_row_amount',
		'weee_tax_disposition',
		'weee_tax_row_disposition',
		'base_weee_tax_applied_amount',
		'base_weee_tax_applied_row_amnt',
		'base_weee_tax_disposition',
		'base_weee_tax_row_disposition'
	];

	public function sales_order()
	{
		return $this->belongsTo(SalesOrder::class, 'order_id');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function downloadable_link_purchased_items()
	{
		return $this->hasMany(DownloadableLinkPurchasedItem::class, 'order_item_id');
	}

	public function sales_order_tax_items()
	{
		return $this->hasMany(SalesOrderTaxItem::class, 'item_id');
	}
}
