<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PaypalBillingAgreementOrder
 * 
 * @property int $agreement_id
 * @property int $order_id
 * 
 * @property SalesOrder $sales_order
 * @property PaypalBillingAgreement $paypal_billing_agreement
 *
 * @package Laragento\Models
 */
class PaypalBillingAgreementOrder extends Model
{
	protected $table = 'paypal_billing_agreement_order';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'agreement_id' => 'int',
		'order_id' => 'int'
	];

	public function sales_order()
	{
		return $this->belongsTo(SalesOrder::class, 'order_id');
	}

	public function paypal_billing_agreement()
	{
		return $this->belongsTo(PaypalBillingAgreement::class, 'agreement_id');
	}
}
