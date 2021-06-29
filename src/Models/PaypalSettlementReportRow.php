<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaypalSettlementReportRow
 * 
 * @property int $row_id
 * @property int $report_id
 * @property string|null $transaction_id
 * @property string|null $invoice_id
 * @property string|null $paypal_reference_id
 * @property string|null $paypal_reference_id_type
 * @property string|null $transaction_event_code
 * @property Carbon|null $transaction_initiation_date
 * @property Carbon|null $transaction_completion_date
 * @property string $transaction_debit_or_credit
 * @property float $gross_transaction_amount
 * @property string|null $gross_transaction_currency
 * @property string|null $fee_debit_or_credit
 * @property float $fee_amount
 * @property string|null $fee_currency
 * @property string|null $custom_field
 * @property string|null $consumer_id
 * @property string|null $payment_tracking_id
 * @property string|null $store_id
 * 
 * @property PaypalSettlementReport $paypal_settlement_report
 *
 * @package Laragento\Models
 */
class PaypalSettlementReportRow extends Model
{
	protected $table = 'paypal_settlement_report_row';
	protected $primaryKey = 'row_id';
	public $timestamps = false;

	protected $casts = [
		'report_id' => 'int',
		'gross_transaction_amount' => 'float',
		'fee_amount' => 'float'
	];

	protected $dates = [
		'transaction_initiation_date',
		'transaction_completion_date'
	];

	protected $fillable = [
		'report_id',
		'transaction_id',
		'invoice_id',
		'paypal_reference_id',
		'paypal_reference_id_type',
		'transaction_event_code',
		'transaction_initiation_date',
		'transaction_completion_date',
		'transaction_debit_or_credit',
		'gross_transaction_amount',
		'gross_transaction_currency',
		'fee_debit_or_credit',
		'fee_amount',
		'fee_currency',
		'custom_field',
		'consumer_id',
		'payment_tracking_id',
		'store_id'
	];

	public function paypal_settlement_report()
	{
		return $this->belongsTo(PaypalSettlementReport::class, 'report_id');
	}
}
