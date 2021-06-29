<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesInvoice
 * 
 * @property int $entity_id
 * @property int|null $store_id
 * @property float|null $base_grand_total
 * @property float|null $shipping_tax_amount
 * @property float|null $tax_amount
 * @property float|null $base_tax_amount
 * @property float|null $store_to_order_rate
 * @property float|null $base_shipping_tax_amount
 * @property float|null $base_discount_amount
 * @property float|null $base_to_order_rate
 * @property float|null $grand_total
 * @property float|null $shipping_amount
 * @property float|null $subtotal_incl_tax
 * @property float|null $base_subtotal_incl_tax
 * @property float|null $store_to_base_rate
 * @property float|null $base_shipping_amount
 * @property float|null $total_qty
 * @property float|null $base_to_global_rate
 * @property float|null $subtotal
 * @property float|null $base_subtotal
 * @property float|null $discount_amount
 * @property int|null $billing_address_id
 * @property int|null $is_used_for_refund
 * @property int $order_id
 * @property int|null $email_sent
 * @property int|null $send_email
 * @property int|null $can_void_flag
 * @property int|null $state
 * @property int|null $shipping_address_id
 * @property string|null $store_currency_code
 * @property string|null $transaction_id
 * @property string|null $order_currency_code
 * @property string|null $base_currency_code
 * @property string|null $global_currency_code
 * @property string|null $increment_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property float|null $discount_tax_compensation_amount
 * @property float|null $base_discount_tax_compensation_amount
 * @property float|null $shipping_discount_tax_compensation_amount
 * @property float|null $base_shipping_discount_tax_compensation_amnt
 * @property float|null $shipping_incl_tax
 * @property float|null $base_shipping_incl_tax
 * @property float|null $base_total_refunded
 * @property string|null $discount_description
 * @property string|null $customer_note
 * @property int|null $customer_note_notify
 * 
 * @property SalesOrder $sales_order
 * @property Store|null $store
 * @property Collection|SalesInvoiceComment[] $sales_invoice_comments
 * @property Collection|SalesInvoiceItem[] $sales_invoice_items
 *
 * @package Laragento\Models
 */
class SalesInvoice extends Model
{
	protected $table = 'sales_invoice';
	protected $primaryKey = 'entity_id';

	protected $casts = [
		'store_id' => 'int',
		'base_grand_total' => 'float',
		'shipping_tax_amount' => 'float',
		'tax_amount' => 'float',
		'base_tax_amount' => 'float',
		'store_to_order_rate' => 'float',
		'base_shipping_tax_amount' => 'float',
		'base_discount_amount' => 'float',
		'base_to_order_rate' => 'float',
		'grand_total' => 'float',
		'shipping_amount' => 'float',
		'subtotal_incl_tax' => 'float',
		'base_subtotal_incl_tax' => 'float',
		'store_to_base_rate' => 'float',
		'base_shipping_amount' => 'float',
		'total_qty' => 'float',
		'base_to_global_rate' => 'float',
		'subtotal' => 'float',
		'base_subtotal' => 'float',
		'discount_amount' => 'float',
		'billing_address_id' => 'int',
		'is_used_for_refund' => 'int',
		'order_id' => 'int',
		'email_sent' => 'int',
		'send_email' => 'int',
		'can_void_flag' => 'int',
		'state' => 'int',
		'shipping_address_id' => 'int',
		'discount_tax_compensation_amount' => 'float',
		'base_discount_tax_compensation_amount' => 'float',
		'shipping_discount_tax_compensation_amount' => 'float',
		'base_shipping_discount_tax_compensation_amnt' => 'float',
		'shipping_incl_tax' => 'float',
		'base_shipping_incl_tax' => 'float',
		'base_total_refunded' => 'float',
		'customer_note_notify' => 'int'
	];

	protected $fillable = [
		'store_id',
		'base_grand_total',
		'shipping_tax_amount',
		'tax_amount',
		'base_tax_amount',
		'store_to_order_rate',
		'base_shipping_tax_amount',
		'base_discount_amount',
		'base_to_order_rate',
		'grand_total',
		'shipping_amount',
		'subtotal_incl_tax',
		'base_subtotal_incl_tax',
		'store_to_base_rate',
		'base_shipping_amount',
		'total_qty',
		'base_to_global_rate',
		'subtotal',
		'base_subtotal',
		'discount_amount',
		'billing_address_id',
		'is_used_for_refund',
		'order_id',
		'email_sent',
		'send_email',
		'can_void_flag',
		'state',
		'shipping_address_id',
		'store_currency_code',
		'transaction_id',
		'order_currency_code',
		'base_currency_code',
		'global_currency_code',
		'increment_id',
		'discount_tax_compensation_amount',
		'base_discount_tax_compensation_amount',
		'shipping_discount_tax_compensation_amount',
		'base_shipping_discount_tax_compensation_amnt',
		'shipping_incl_tax',
		'base_shipping_incl_tax',
		'base_total_refunded',
		'discount_description',
		'customer_note',
		'customer_note_notify'
	];

	public function sales_order()
	{
		return $this->belongsTo(SalesOrder::class, 'order_id');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function sales_invoice_comments()
	{
		return $this->hasMany(SalesInvoiceComment::class, 'parent_id');
	}

	public function sales_invoice_items()
	{
		return $this->hasMany(SalesInvoiceItem::class, 'parent_id');
	}
}
