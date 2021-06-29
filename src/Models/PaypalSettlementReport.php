<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaypalSettlementReport
 * 
 * @property int $report_id
 * @property Carbon|null $report_date
 * @property string|null $account_id
 * @property string|null $filename
 * @property Carbon|null $last_modified
 * 
 * @property Collection|PaypalSettlementReportRow[] $paypal_settlement_report_rows
 *
 * @package Laragento\Models
 */
class PaypalSettlementReport extends Model
{
	protected $table = 'paypal_settlement_report';
	protected $primaryKey = 'report_id';
	public $timestamps = false;

	protected $dates = [
		'report_date',
		'last_modified'
	];

	protected $fillable = [
		'report_date',
		'account_id',
		'filename',
		'last_modified'
	];

	public function paypal_settlement_report_rows()
	{
		return $this->hasMany(PaypalSettlementReportRow::class, 'report_id');
	}
}
