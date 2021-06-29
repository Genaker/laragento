<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesOrder
 * 
 * @property int $entity_id
 * @property string|null $state
 * @property string|null $status
 * @property string|null $coupon_code
 * @property string|null $protect_code
 * @property string|null $shipping_description
 * @property int|null $is_virtual
 * @property int|null $store_id
 * @property int|null $customer_id
 * @property float|null $base_discount_amount
 * @property float|null $base_discount_canceled
 * @property float|null $base_discount_invoiced
 * @property float|null $base_discount_refunded
 * @property float|null $base_grand_total
 * @property float|null $base_shipping_amount
 * @property float|null $base_shipping_canceled
 * @property float|null $base_shipping_invoiced
 * @property float|null $base_shipping_refunded
 * @property float|null $base_shipping_tax_amount
 * @property float|null $base_shipping_tax_refunded
 * @property float|null $base_subtotal
 * @property float|null $base_subtotal_canceled
 * @property float|null $base_subtotal_invoiced
 * @property float|null $base_subtotal_refunded
 * @property float|null $base_tax_amount
 * @property float|null $base_tax_canceled
 * @property float|null $base_tax_invoiced
 * @property float|null $base_tax_refunded
 * @property float|null $base_to_global_rate
 * @property float|null $base_to_order_rate
 * @property float|null $base_total_canceled
 * @property float|null $base_total_invoiced
 * @property float|null $base_total_invoiced_cost
 * @property float|null $base_total_offline_refunded
 * @property float|null $base_total_online_refunded
 * @property float|null $base_total_paid
 * @property float|null $base_total_qty_ordered
 * @property float|null $base_total_refunded
 * @property float|null $discount_amount
 * @property float|null $discount_canceled
 * @property float|null $discount_invoiced
 * @property float|null $discount_refunded
 * @property float|null $grand_total
 * @property float|null $shipping_amount
 * @property float|null $shipping_canceled
 * @property float|null $shipping_invoiced
 * @property float|null $shipping_refunded
 * @property float|null $shipping_tax_amount
 * @property float|null $shipping_tax_refunded
 * @property float|null $store_to_base_rate
 * @property float|null $store_to_order_rate
 * @property float|null $subtotal
 * @property float|null $subtotal_canceled
 * @property float|null $subtotal_invoiced
 * @property float|null $subtotal_refunded
 * @property float|null $tax_amount
 * @property float|null $tax_canceled
 * @property float|null $tax_invoiced
 * @property float|null $tax_refunded
 * @property float|null $total_canceled
 * @property float|null $total_invoiced
 * @property float|null $total_offline_refunded
 * @property float|null $total_online_refunded
 * @property float|null $total_paid
 * @property float|null $total_qty_ordered
 * @property float|null $total_refunded
 * @property int|null $can_ship_partially
 * @property int|null $can_ship_partially_item
 * @property int|null $customer_is_guest
 * @property int|null $customer_note_notify
 * @property int|null $billing_address_id
 * @property int|null $customer_group_id
 * @property int|null $edit_increment
 * @property int|null $email_sent
 * @property int|null $send_email
 * @property int|null $forced_shipment_with_invoice
 * @property int|null $payment_auth_expiration
 * @property int|null $quote_address_id
 * @property int|null $quote_id
 * @property int|null $shipping_address_id
 * @property float|null $adjustment_negative
 * @property float|null $adjustment_positive
 * @property float|null $base_adjustment_negative
 * @property float|null $base_adjustment_positive
 * @property float|null $base_shipping_discount_amount
 * @property float|null $base_subtotal_incl_tax
 * @property float|null $base_total_due
 * @property float|null $payment_authorization_amount
 * @property float|null $shipping_discount_amount
 * @property float|null $subtotal_incl_tax
 * @property float|null $total_due
 * @property float|null $weight
 * @property Carbon|null $customer_dob
 * @property string|null $increment_id
 * @property string|null $applied_rule_ids
 * @property string|null $base_currency_code
 * @property string|null $customer_email
 * @property string|null $customer_firstname
 * @property string|null $customer_lastname
 * @property string|null $customer_middlename
 * @property string|null $customer_prefix
 * @property string|null $customer_suffix
 * @property string|null $customer_taxvat
 * @property string|null $discount_description
 * @property string|null $ext_customer_id
 * @property string|null $ext_order_id
 * @property string|null $global_currency_code
 * @property string|null $hold_before_state
 * @property string|null $hold_before_status
 * @property string|null $order_currency_code
 * @property string|null $original_increment_id
 * @property string|null $relation_child_id
 * @property string|null $relation_child_real_id
 * @property string|null $relation_parent_id
 * @property string|null $relation_parent_real_id
 * @property string|null $remote_ip
 * @property string|null $shipping_method
 * @property string|null $store_currency_code
 * @property string|null $store_name
 * @property string|null $x_forwarded_for
 * @property string|null $customer_note
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $total_item_count
 * @property int|null $customer_gender
 * @property float|null $discount_tax_compensation_amount
 * @property float|null $base_discount_tax_compensation_amount
 * @property float|null $shipping_discount_tax_compensation_amount
 * @property float|null $base_shipping_discount_tax_compensation_amnt
 * @property float|null $discount_tax_compensation_invoiced
 * @property float|null $base_discount_tax_compensation_invoiced
 * @property float|null $discount_tax_compensation_refunded
 * @property float|null $base_discount_tax_compensation_refunded
 * @property float|null $shipping_incl_tax
 * @property float|null $base_shipping_incl_tax
 * @property string|null $coupon_rule_name
 * @property int|null $gift_message_id
 * @property int|null $paypal_ipn_customer_notified
 * 
 * @property CustomerEntity|null $customer_entity
 * @property Store|null $store
 * @property Collection|DownloadableLinkPurchased[] $downloadable_link_purchaseds
 * @property Collection|PaypalBillingAgreementOrder[] $paypal_billing_agreement_orders
 * @property Collection|SalesCreditmemo[] $sales_creditmemos
 * @property Collection|SalesInvoice[] $sales_invoices
 * @property Collection|SalesOrderAddress[] $sales_order_addresses
 * @property Collection|SalesOrderItem[] $sales_order_items
 * @property Collection|SalesOrderPayment[] $sales_order_payments
 * @property Collection|SalesOrderStatusHistory[] $sales_order_status_histories
 * @property Collection|SalesPaymentTransaction[] $sales_payment_transactions
 * @property Collection|SalesShipment[] $sales_shipments
 *
 * @package Laragento\Models
 */
class SalesOrder extends Model
{
	protected $table = 'sales_order';
	protected $primaryKey = 'entity_id';

	protected $casts = [
		'is_virtual' => 'int',
		'store_id' => 'int',
		'customer_id' => 'int',
		'base_discount_amount' => 'float',
		'base_discount_canceled' => 'float',
		'base_discount_invoiced' => 'float',
		'base_discount_refunded' => 'float',
		'base_grand_total' => 'float',
		'base_shipping_amount' => 'float',
		'base_shipping_canceled' => 'float',
		'base_shipping_invoiced' => 'float',
		'base_shipping_refunded' => 'float',
		'base_shipping_tax_amount' => 'float',
		'base_shipping_tax_refunded' => 'float',
		'base_subtotal' => 'float',
		'base_subtotal_canceled' => 'float',
		'base_subtotal_invoiced' => 'float',
		'base_subtotal_refunded' => 'float',
		'base_tax_amount' => 'float',
		'base_tax_canceled' => 'float',
		'base_tax_invoiced' => 'float',
		'base_tax_refunded' => 'float',
		'base_to_global_rate' => 'float',
		'base_to_order_rate' => 'float',
		'base_total_canceled' => 'float',
		'base_total_invoiced' => 'float',
		'base_total_invoiced_cost' => 'float',
		'base_total_offline_refunded' => 'float',
		'base_total_online_refunded' => 'float',
		'base_total_paid' => 'float',
		'base_total_qty_ordered' => 'float',
		'base_total_refunded' => 'float',
		'discount_amount' => 'float',
		'discount_canceled' => 'float',
		'discount_invoiced' => 'float',
		'discount_refunded' => 'float',
		'grand_total' => 'float',
		'shipping_amount' => 'float',
		'shipping_canceled' => 'float',
		'shipping_invoiced' => 'float',
		'shipping_refunded' => 'float',
		'shipping_tax_amount' => 'float',
		'shipping_tax_refunded' => 'float',
		'store_to_base_rate' => 'float',
		'store_to_order_rate' => 'float',
		'subtotal' => 'float',
		'subtotal_canceled' => 'float',
		'subtotal_invoiced' => 'float',
		'subtotal_refunded' => 'float',
		'tax_amount' => 'float',
		'tax_canceled' => 'float',
		'tax_invoiced' => 'float',
		'tax_refunded' => 'float',
		'total_canceled' => 'float',
		'total_invoiced' => 'float',
		'total_offline_refunded' => 'float',
		'total_online_refunded' => 'float',
		'total_paid' => 'float',
		'total_qty_ordered' => 'float',
		'total_refunded' => 'float',
		'can_ship_partially' => 'int',
		'can_ship_partially_item' => 'int',
		'customer_is_guest' => 'int',
		'customer_note_notify' => 'int',
		'billing_address_id' => 'int',
		'customer_group_id' => 'int',
		'edit_increment' => 'int',
		'email_sent' => 'int',
		'send_email' => 'int',
		'forced_shipment_with_invoice' => 'int',
		'payment_auth_expiration' => 'int',
		'quote_address_id' => 'int',
		'quote_id' => 'int',
		'shipping_address_id' => 'int',
		'adjustment_negative' => 'float',
		'adjustment_positive' => 'float',
		'base_adjustment_negative' => 'float',
		'base_adjustment_positive' => 'float',
		'base_shipping_discount_amount' => 'float',
		'base_subtotal_incl_tax' => 'float',
		'base_total_due' => 'float',
		'payment_authorization_amount' => 'float',
		'shipping_discount_amount' => 'float',
		'subtotal_incl_tax' => 'float',
		'total_due' => 'float',
		'weight' => 'float',
		'total_item_count' => 'int',
		'customer_gender' => 'int',
		'discount_tax_compensation_amount' => 'float',
		'base_discount_tax_compensation_amount' => 'float',
		'shipping_discount_tax_compensation_amount' => 'float',
		'base_shipping_discount_tax_compensation_amnt' => 'float',
		'discount_tax_compensation_invoiced' => 'float',
		'base_discount_tax_compensation_invoiced' => 'float',
		'discount_tax_compensation_refunded' => 'float',
		'base_discount_tax_compensation_refunded' => 'float',
		'shipping_incl_tax' => 'float',
		'base_shipping_incl_tax' => 'float',
		'gift_message_id' => 'int',
		'paypal_ipn_customer_notified' => 'int'
	];

	protected $dates = [
		'customer_dob'
	];

	protected $fillable = [
		'state',
		'status',
		'coupon_code',
		'protect_code',
		'shipping_description',
		'is_virtual',
		'store_id',
		'customer_id',
		'base_discount_amount',
		'base_discount_canceled',
		'base_discount_invoiced',
		'base_discount_refunded',
		'base_grand_total',
		'base_shipping_amount',
		'base_shipping_canceled',
		'base_shipping_invoiced',
		'base_shipping_refunded',
		'base_shipping_tax_amount',
		'base_shipping_tax_refunded',
		'base_subtotal',
		'base_subtotal_canceled',
		'base_subtotal_invoiced',
		'base_subtotal_refunded',
		'base_tax_amount',
		'base_tax_canceled',
		'base_tax_invoiced',
		'base_tax_refunded',
		'base_to_global_rate',
		'base_to_order_rate',
		'base_total_canceled',
		'base_total_invoiced',
		'base_total_invoiced_cost',
		'base_total_offline_refunded',
		'base_total_online_refunded',
		'base_total_paid',
		'base_total_qty_ordered',
		'base_total_refunded',
		'discount_amount',
		'discount_canceled',
		'discount_invoiced',
		'discount_refunded',
		'grand_total',
		'shipping_amount',
		'shipping_canceled',
		'shipping_invoiced',
		'shipping_refunded',
		'shipping_tax_amount',
		'shipping_tax_refunded',
		'store_to_base_rate',
		'store_to_order_rate',
		'subtotal',
		'subtotal_canceled',
		'subtotal_invoiced',
		'subtotal_refunded',
		'tax_amount',
		'tax_canceled',
		'tax_invoiced',
		'tax_refunded',
		'total_canceled',
		'total_invoiced',
		'total_offline_refunded',
		'total_online_refunded',
		'total_paid',
		'total_qty_ordered',
		'total_refunded',
		'can_ship_partially',
		'can_ship_partially_item',
		'customer_is_guest',
		'customer_note_notify',
		'billing_address_id',
		'customer_group_id',
		'edit_increment',
		'email_sent',
		'send_email',
		'forced_shipment_with_invoice',
		'payment_auth_expiration',
		'quote_address_id',
		'quote_id',
		'shipping_address_id',
		'adjustment_negative',
		'adjustment_positive',
		'base_adjustment_negative',
		'base_adjustment_positive',
		'base_shipping_discount_amount',
		'base_subtotal_incl_tax',
		'base_total_due',
		'payment_authorization_amount',
		'shipping_discount_amount',
		'subtotal_incl_tax',
		'total_due',
		'weight',
		'customer_dob',
		'increment_id',
		'applied_rule_ids',
		'base_currency_code',
		'customer_email',
		'customer_firstname',
		'customer_lastname',
		'customer_middlename',
		'customer_prefix',
		'customer_suffix',
		'customer_taxvat',
		'discount_description',
		'ext_customer_id',
		'ext_order_id',
		'global_currency_code',
		'hold_before_state',
		'hold_before_status',
		'order_currency_code',
		'original_increment_id',
		'relation_child_id',
		'relation_child_real_id',
		'relation_parent_id',
		'relation_parent_real_id',
		'remote_ip',
		'shipping_method',
		'store_currency_code',
		'store_name',
		'x_forwarded_for',
		'customer_note',
		'total_item_count',
		'customer_gender',
		'discount_tax_compensation_amount',
		'base_discount_tax_compensation_amount',
		'shipping_discount_tax_compensation_amount',
		'base_shipping_discount_tax_compensation_amnt',
		'discount_tax_compensation_invoiced',
		'base_discount_tax_compensation_invoiced',
		'discount_tax_compensation_refunded',
		'base_discount_tax_compensation_refunded',
		'shipping_incl_tax',
		'base_shipping_incl_tax',
		'coupon_rule_name',
		'gift_message_id',
		'paypal_ipn_customer_notified'
	];

	public function customer_entity()
	{
		return $this->belongsTo(CustomerEntity::class, 'customer_id');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function downloadable_link_purchaseds()
	{
		return $this->hasMany(DownloadableLinkPurchased::class, 'order_id');
	}

	public function paypal_billing_agreement_orders()
	{
		return $this->hasMany(PaypalBillingAgreementOrder::class, 'order_id');
	}

	public function sales_creditmemos()
	{
		return $this->hasMany(SalesCreditmemo::class, 'order_id');
	}

	public function sales_invoices()
	{
		return $this->hasMany(SalesInvoice::class, 'order_id');
	}

	public function sales_order_addresses()
	{
		return $this->hasMany(SalesOrderAddress::class, 'parent_id');
	}

	public function sales_order_items()
	{
		return $this->hasMany(SalesOrderItem::class, 'order_id');
	}

	public function sales_order_payments()
	{
		return $this->hasMany(SalesOrderPayment::class, 'parent_id');
	}

	public function sales_order_status_histories()
	{
		return $this->hasMany(SalesOrderStatusHistory::class, 'parent_id');
	}

	public function sales_payment_transactions()
	{
		return $this->hasMany(SalesPaymentTransaction::class, 'order_id');
	}

	public function sales_shipments()
	{
		return $this->hasMany(SalesShipment::class, 'order_id');
	}
}
