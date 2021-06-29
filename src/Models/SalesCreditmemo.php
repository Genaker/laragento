<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesCreditmemo
 * 
 * @property int $entity_id
 * @property int|null $store_id
 * @property float|null $adjustment_positive
 * @property float|null $base_shipping_tax_amount
 * @property float|null $store_to_order_rate
 * @property float|null $base_discount_amount
 * @property float|null $base_to_order_rate
 * @property float|null $grand_total
 * @property float|null $base_adjustment_negative
 * @property float|null $base_subtotal_incl_tax
 * @property float|null $shipping_amount
 * @property float|null $subtotal_incl_tax
 * @property float|null $adjustment_negative
 * @property float|null $base_shipping_amount
 * @property float|null $store_to_base_rate
 * @property float|null $base_to_global_rate
 * @property float|null $base_adjustment
 * @property float|null $base_subtotal
 * @property float|null $discount_amount
 * @property float|null $subtotal
 * @property float|null $adjustment
 * @property float|null $base_grand_total
 * @property float|null $base_adjustment_positive
 * @property float|null $base_tax_amount
 * @property float|null $shipping_tax_amount
 * @property float|null $tax_amount
 * @property int $order_id
 * @property int|null $email_sent
 * @property int|null $send_email
 * @property int|null $creditmemo_status
 * @property int|null $state
 * @property int|null $shipping_address_id
 * @property int|null $billing_address_id
 * @property int|null $invoice_id
 * @property string|null $store_currency_code
 * @property string|null $order_currency_code
 * @property string|null $base_currency_code
 * @property string|null $global_currency_code
 * @property string|null $transaction_id
 * @property string|null $increment_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property float|null $discount_tax_compensation_amount
 * @property float|null $base_discount_tax_compensation_amount
 * @property float|null $shipping_discount_tax_compensation_amount
 * @property float|null $base_shipping_discount_tax_compensation_amnt
 * @property float|null $shipping_incl_tax
 * @property float|null $base_shipping_incl_tax
 * @property string|null $discount_description
 * @property string|null $customer_note
 * @property int|null $customer_note_notify
 * 
 * @property SalesOrder $sales_order
 * @property Store|null $store
 * @property Collection|SalesCreditmemoComment[] $sales_creditmemo_comments
 * @property Collection|SalesCreditmemoItem[] $sales_creditmemo_items
 *
 * @package Laragento\Models
 */
class SalesCreditmemo extends Model
{
	protected $table = 'sales_creditmemo';
	protected $primaryKey = 'entity_id';

	protected $casts = [
		'store_id' => 'int',
		'adjustment_positive' => 'float',
		'base_shipping_tax_amount' => 'float',
		'store_to_order_rate' => 'float',
		'base_discount_amount' => 'float',
		'base_to_order_rate' => 'float',
		'grand_total' => 'float',
		'base_adjustment_negative' => 'float',
		'base_subtotal_incl_tax' => 'float',
		'shipping_amount' => 'float',
		'subtotal_incl_tax' => 'float',
		'adjustment_negative' => 'float',
		'base_shipping_amount' => 'float',
		'store_to_base_rate' => 'float',
		'base_to_global_rate' => 'float',
		'base_adjustment' => 'float',
		'base_subtotal' => 'float',
		'discount_amount' => 'float',
		'subtotal' => 'float',
		'adjustment' => 'float',
		'base_grand_total' => 'float',
		'base_adjustment_positive' => 'float',
		'base_tax_amount' => 'float',
		'shipping_tax_amount' => 'float',
		'tax_amount' => 'float',
		'order_id' => 'int',
		'email_sent' => 'int',
		'send_email' => 'int',
		'creditmemo_status' => 'int',
		'state' => 'int',
		'shipping_address_id' => 'int',
		'billing_address_id' => 'int',
		'invoice_id' => 'int',
		'discount_tax_compensation_amount' => 'float',
		'base_discount_tax_compensation_amount' => 'float',
		'shipping_discount_tax_compensation_amount' => 'float',
		'base_shipping_discount_tax_compensation_amnt' => 'float',
		'shipping_incl_tax' => 'float',
		'base_shipping_incl_tax' => 'float',
		'customer_note_notify' => 'int'
	];

	protected $fillable = [
		'store_id',
		'adjustment_positive',
		'base_shipping_tax_amount',
		'store_to_order_rate',
		'base_discount_amount',
		'base_to_order_rate',
		'grand_total',
		'base_adjustment_negative',
		'base_subtotal_incl_tax',
		'shipping_amount',
		'subtotal_incl_tax',
		'adjustment_negative',
		'base_shipping_amount',
		'store_to_base_rate',
		'base_to_global_rate',
		'base_adjustment',
		'base_subtotal',
		'discount_amount',
		'subtotal',
		'adjustment',
		'base_grand_total',
		'base_adjustment_positive',
		'base_tax_amount',
		'shipping_tax_amount',
		'tax_amount',
		'order_id',
		'email_sent',
		'send_email',
		'creditmemo_status',
		'state',
		'shipping_address_id',
		'billing_address_id',
		'invoice_id',
		'store_currency_code',
		'order_currency_code',
		'base_currency_code',
		'global_currency_code',
		'transaction_id',
		'increment_id',
		'discount_tax_compensation_amount',
		'base_discount_tax_compensation_amount',
		'shipping_discount_tax_compensation_amount',
		'base_shipping_discount_tax_compensation_amnt',
		'shipping_incl_tax',
		'base_shipping_incl_tax',
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

	public function sales_creditmemo_comments()
	{
		return $this->hasMany(SalesCreditmemoComment::class, 'parent_id');
	}

	public function sales_creditmemo_items()
	{
		return $this->hasMany(SalesCreditmemoItem::class, 'parent_id');
	}
}
