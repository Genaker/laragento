<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QuotePayment
 * 
 * @property int $payment_id
 * @property int $quote_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $method
 * @property string|null $cc_type
 * @property string|null $cc_number_enc
 * @property string|null $cc_last_4
 * @property string|null $cc_cid_enc
 * @property string|null $cc_owner
 * @property string|null $cc_exp_month
 * @property int|null $cc_exp_year
 * @property string|null $cc_ss_owner
 * @property int|null $cc_ss_start_month
 * @property int|null $cc_ss_start_year
 * @property string|null $po_number
 * @property string|null $additional_data
 * @property string|null $cc_ss_issue
 * @property string|null $additional_information
 * @property string|null $paypal_payer_id
 * @property string|null $paypal_payer_status
 * @property string|null $paypal_correlation_id
 * 
 * @property Quote $quote
 *
 * @package Laragento\Models
 */
class QuotePayment extends Model
{
	protected $table = 'quote_payment';
	protected $primaryKey = 'payment_id';

	protected $casts = [
		'quote_id' => 'int',
		'cc_exp_year' => 'int',
		'cc_ss_start_month' => 'int',
		'cc_ss_start_year' => 'int'
	];

	protected $fillable = [
		'quote_id',
		'method',
		'cc_type',
		'cc_number_enc',
		'cc_last_4',
		'cc_cid_enc',
		'cc_owner',
		'cc_exp_month',
		'cc_exp_year',
		'cc_ss_owner',
		'cc_ss_start_month',
		'cc_ss_start_year',
		'po_number',
		'additional_data',
		'cc_ss_issue',
		'additional_information',
		'paypal_payer_id',
		'paypal_payer_status',
		'paypal_correlation_id'
	];

	public function quote()
	{
		return $this->belongsTo(Quote::class);
	}
}
