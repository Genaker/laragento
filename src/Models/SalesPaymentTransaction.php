<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesPaymentTransaction
 * 
 * @property int $transaction_id
 * @property int|null $parent_id
 * @property int $order_id
 * @property int $payment_id
 * @property string|null $txn_id
 * @property string|null $parent_txn_id
 * @property string|null $txn_type
 * @property int $is_closed
 * @property boolean|null $additional_information
 * @property Carbon $created_at
 * 
 * @property SalesPaymentTransaction|null $sales_payment_transaction
 * @property SalesOrder $sales_order
 * @property SalesOrderPayment $sales_order_payment
 * @property Collection|SalesPaymentTransaction[] $sales_payment_transactions
 *
 * @package Laragento\Models
 */
class SalesPaymentTransaction extends Model
{
	protected $table = 'sales_payment_transaction';
	protected $primaryKey = 'transaction_id';
	public $timestamps = false;

	protected $casts = [
		'parent_id' => 'int',
		'order_id' => 'int',
		'payment_id' => 'int',
		'is_closed' => 'int',
		'additional_information' => 'boolean'
	];

	protected $fillable = [
		'parent_id',
		'order_id',
		'payment_id',
		'txn_id',
		'parent_txn_id',
		'txn_type',
		'is_closed',
		'additional_information'
	];

	public function sales_payment_transaction()
	{
		return $this->belongsTo(SalesPaymentTransaction::class, 'parent_id');
	}

	public function sales_order()
	{
		return $this->belongsTo(SalesOrder::class, 'order_id');
	}

	public function sales_order_payment()
	{
		return $this->belongsTo(SalesOrderPayment::class, 'payment_id');
	}

	public function sales_payment_transactions()
	{
		return $this->hasMany(SalesPaymentTransaction::class, 'parent_id');
	}
}
