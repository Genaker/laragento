<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesInvoiceGrid
 * 
 * @property int $entity_id
 * @property string|null $increment_id
 * @property int|null $state
 * @property int|null $store_id
 * @property string|null $store_name
 * @property int $order_id
 * @property string|null $order_increment_id
 * @property Carbon|null $order_created_at
 * @property string|null $customer_name
 * @property string|null $customer_email
 * @property int|null $customer_group_id
 * @property string|null $payment_method
 * @property string|null $store_currency_code
 * @property string|null $order_currency_code
 * @property string|null $base_currency_code
 * @property string|null $global_currency_code
 * @property string|null $billing_name
 * @property string|null $billing_address
 * @property string|null $shipping_address
 * @property string|null $shipping_information
 * @property float|null $subtotal
 * @property float|null $shipping_and_handling
 * @property float|null $grand_total
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property float|null $base_grand_total
 *
 * @package Laragento\Models
 */
class SalesInvoiceGrid extends Model
{
	protected $table = 'sales_invoice_grid';
	protected $primaryKey = 'entity_id';
	public $incrementing = false;

	protected $casts = [
		'entity_id' => 'int',
		'state' => 'int',
		'store_id' => 'int',
		'order_id' => 'int',
		'customer_group_id' => 'int',
		'subtotal' => 'float',
		'shipping_and_handling' => 'float',
		'grand_total' => 'float',
		'base_grand_total' => 'float'
	];

	protected $dates = [
		'order_created_at'
	];

	protected $fillable = [
		'increment_id',
		'state',
		'store_id',
		'store_name',
		'order_id',
		'order_increment_id',
		'order_created_at',
		'customer_name',
		'customer_email',
		'customer_group_id',
		'payment_method',
		'store_currency_code',
		'order_currency_code',
		'base_currency_code',
		'global_currency_code',
		'billing_name',
		'billing_address',
		'shipping_address',
		'shipping_information',
		'subtotal',
		'shipping_and_handling',
		'grand_total',
		'base_grand_total'
	];
}
