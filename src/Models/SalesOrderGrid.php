<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesOrderGrid
 * 
 * @property int $entity_id
 * @property string|null $status
 * @property int|null $store_id
 * @property string|null $store_name
 * @property int|null $customer_id
 * @property float|null $base_grand_total
 * @property float|null $base_total_paid
 * @property float|null $grand_total
 * @property float|null $total_paid
 * @property string|null $increment_id
 * @property string|null $base_currency_code
 * @property string|null $order_currency_code
 * @property string|null $shipping_name
 * @property string|null $billing_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $billing_address
 * @property string|null $shipping_address
 * @property string|null $shipping_information
 * @property string|null $customer_email
 * @property string|null $customer_group
 * @property float|null $subtotal
 * @property float|null $shipping_and_handling
 * @property string|null $customer_name
 * @property string|null $payment_method
 * @property float|null $total_refunded
 *
 * @package Laragento\Models
 */
class SalesOrderGrid extends Model
{
	protected $table = 'sales_order_grid';
	protected $primaryKey = 'entity_id';
	public $incrementing = false;

	protected $casts = [
		'entity_id' => 'int',
		'store_id' => 'int',
		'customer_id' => 'int',
		'base_grand_total' => 'float',
		'base_total_paid' => 'float',
		'grand_total' => 'float',
		'total_paid' => 'float',
		'subtotal' => 'float',
		'shipping_and_handling' => 'float',
		'total_refunded' => 'float'
	];

	protected $fillable = [
		'status',
		'store_id',
		'store_name',
		'customer_id',
		'base_grand_total',
		'base_total_paid',
		'grand_total',
		'total_paid',
		'increment_id',
		'base_currency_code',
		'order_currency_code',
		'shipping_name',
		'billing_name',
		'billing_address',
		'shipping_address',
		'shipping_information',
		'customer_email',
		'customer_group',
		'subtotal',
		'shipping_and_handling',
		'customer_name',
		'payment_method',
		'total_refunded'
	];
}
