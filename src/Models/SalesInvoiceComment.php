<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesInvoiceComment
 * 
 * @property int $entity_id
 * @property int $parent_id
 * @property int|null $is_customer_notified
 * @property int $is_visible_on_front
 * @property string|null $comment
 * @property Carbon $created_at
 * 
 * @property SalesInvoice $sales_invoice
 *
 * @package Laragento\Models
 */
class SalesInvoiceComment extends Model
{
	protected $table = 'sales_invoice_comment';
	protected $primaryKey = 'entity_id';
	public $timestamps = false;

	protected $casts = [
		'parent_id' => 'int',
		'is_customer_notified' => 'int',
		'is_visible_on_front' => 'int'
	];

	protected $fillable = [
		'parent_id',
		'is_customer_notified',
		'is_visible_on_front',
		'comment'
	];

	public function sales_invoice()
	{
		return $this->belongsTo(SalesInvoice::class, 'parent_id');
	}
}
