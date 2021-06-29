<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VaultPaymentTokenOrderPaymentLink
 * 
 * @property int $order_payment_id
 * @property int $payment_token_id
 * 
 * @property VaultPaymentToken $vault_payment_token
 * @property SalesOrderPayment $sales_order_payment
 *
 * @package Laragento\Models
 */
class VaultPaymentTokenOrderPaymentLink extends Model
{
	protected $table = 'vault_payment_token_order_payment_link';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'order_payment_id' => 'int',
		'payment_token_id' => 'int'
	];

	public function vault_payment_token()
	{
		return $this->belongsTo(VaultPaymentToken::class, 'payment_token_id');
	}

	public function sales_order_payment()
	{
		return $this->belongsTo(SalesOrderPayment::class, 'order_payment_id');
	}
}
