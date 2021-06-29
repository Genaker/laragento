<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaypalPaymentTransaction
 * 
 * @property int $transaction_id
 * @property string|null $txn_id
 * @property boolean|null $additional_information
 * @property Carbon|null $created_at
 *
 * @package Laragento\Models
 */
class PaypalPaymentTransaction extends Model
{
	protected $table = 'paypal_payment_transaction';
	protected $primaryKey = 'transaction_id';
	public $timestamps = false;

	protected $casts = [
		'additional_information' => 'boolean'
	];

	protected $fillable = [
		'txn_id',
		'additional_information'
	];
}
