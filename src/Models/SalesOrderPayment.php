<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesOrderPayment
 * 
 * @property int $entity_id
 * @property int $parent_id
 * @property float|null $base_shipping_captured
 * @property float|null $shipping_captured
 * @property float|null $amount_refunded
 * @property float|null $base_amount_paid
 * @property float|null $amount_canceled
 * @property float|null $base_amount_authorized
 * @property float|null $base_amount_paid_online
 * @property float|null $base_amount_refunded_online
 * @property float|null $base_shipping_amount
 * @property float|null $shipping_amount
 * @property float|null $amount_paid
 * @property float|null $amount_authorized
 * @property float|null $base_amount_ordered
 * @property float|null $base_shipping_refunded
 * @property float|null $shipping_refunded
 * @property float|null $base_amount_refunded
 * @property float|null $amount_ordered
 * @property float|null $base_amount_canceled
 * @property int|null $quote_payment_id
 * @property string|null $additional_data
 * @property string|null $cc_exp_month
 * @property string|null $cc_ss_start_year
 * @property string|null $echeck_bank_name
 * @property string|null $method
 * @property string|null $cc_debug_request_body
 * @property string|null $cc_secure_verify
 * @property string|null $protection_eligibility
 * @property string|null $cc_approval
 * @property string|null $cc_last_4
 * @property string|null $cc_status_description
 * @property string|null $echeck_type
 * @property string|null $cc_debug_response_serialized
 * @property string|null $cc_ss_start_month
 * @property string|null $echeck_account_type
 * @property string|null $last_trans_id
 * @property string|null $cc_cid_status
 * @property string|null $cc_owner
 * @property string|null $cc_type
 * @property string|null $po_number
 * @property string|null $cc_exp_year
 * @property string|null $cc_status
 * @property string|null $echeck_routing_number
 * @property string|null $account_status
 * @property string|null $anet_trans_method
 * @property string|null $cc_debug_response_body
 * @property string|null $cc_ss_issue
 * @property string|null $echeck_account_name
 * @property string|null $cc_avs_status
 * @property string|null $cc_number_enc
 * @property string|null $cc_trans_id
 * @property string|null $address_status
 * @property string|null $additional_information
 * 
 * @property SalesOrder $sales_order
 * @property Collection|SalesPaymentTransaction[] $sales_payment_transactions
 * @property Collection|VaultPaymentTokenOrderPaymentLink[] $vault_payment_token_order_payment_links
 *
 * @package Laragento\Models
 */
class SalesOrderPayment extends Model
{
	protected $table = 'sales_order_payment';
	protected $primaryKey = 'entity_id';
	public $timestamps = false;

	protected $casts = [
		'parent_id' => 'int',
		'base_shipping_captured' => 'float',
		'shipping_captured' => 'float',
		'amount_refunded' => 'float',
		'base_amount_paid' => 'float',
		'amount_canceled' => 'float',
		'base_amount_authorized' => 'float',
		'base_amount_paid_online' => 'float',
		'base_amount_refunded_online' => 'float',
		'base_shipping_amount' => 'float',
		'shipping_amount' => 'float',
		'amount_paid' => 'float',
		'amount_authorized' => 'float',
		'base_amount_ordered' => 'float',
		'base_shipping_refunded' => 'float',
		'shipping_refunded' => 'float',
		'base_amount_refunded' => 'float',
		'amount_ordered' => 'float',
		'base_amount_canceled' => 'float',
		'quote_payment_id' => 'int'
	];

	protected $fillable = [
		'parent_id',
		'base_shipping_captured',
		'shipping_captured',
		'amount_refunded',
		'base_amount_paid',
		'amount_canceled',
		'base_amount_authorized',
		'base_amount_paid_online',
		'base_amount_refunded_online',
		'base_shipping_amount',
		'shipping_amount',
		'amount_paid',
		'amount_authorized',
		'base_amount_ordered',
		'base_shipping_refunded',
		'shipping_refunded',
		'base_amount_refunded',
		'amount_ordered',
		'base_amount_canceled',
		'quote_payment_id',
		'additional_data',
		'cc_exp_month',
		'cc_ss_start_year',
		'echeck_bank_name',
		'method',
		'cc_debug_request_body',
		'cc_secure_verify',
		'protection_eligibility',
		'cc_approval',
		'cc_last_4',
		'cc_status_description',
		'echeck_type',
		'cc_debug_response_serialized',
		'cc_ss_start_month',
		'echeck_account_type',
		'last_trans_id',
		'cc_cid_status',
		'cc_owner',
		'cc_type',
		'po_number',
		'cc_exp_year',
		'cc_status',
		'echeck_routing_number',
		'account_status',
		'anet_trans_method',
		'cc_debug_response_body',
		'cc_ss_issue',
		'echeck_account_name',
		'cc_avs_status',
		'cc_number_enc',
		'cc_trans_id',
		'address_status',
		'additional_information'
	];

	public function sales_order()
	{
		return $this->belongsTo(SalesOrder::class, 'parent_id');
	}

	public function sales_payment_transactions()
	{
		return $this->hasMany(SalesPaymentTransaction::class, 'payment_id');
	}

	public function vault_payment_token_order_payment_links()
	{
		return $this->hasMany(VaultPaymentTokenOrderPaymentLink::class, 'order_payment_id');
	}
}
