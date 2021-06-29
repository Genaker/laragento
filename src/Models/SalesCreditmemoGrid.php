<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesCreditmemoGrid
 * 
 * @property int $entity_id
 * @property string|null $increment_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $order_id
 * @property string|null $order_increment_id
 * @property Carbon|null $order_created_at
 * @property string|null $billing_name
 * @property int|null $state
 * @property float|null $base_grand_total
 * @property string|null $order_status
 * @property int|null $store_id
 * @property string|null $billing_address
 * @property string|null $shipping_address
 * @property string $customer_name
 * @property string|null $customer_email
 * @property int|null $customer_group_id
 * @property string|null $payment_method
 * @property string|null $shipping_information
 * @property float|null $subtotal
 * @property float|null $shipping_and_handling
 * @property float|null $adjustment_positive
 * @property float|null $adjustment_negative
 * @property float|null $order_base_grand_total
 *
 * @package Laragento\Models
 */
class SalesCreditmemoGrid extends Model
{
	protected $table = 'sales_creditmemo_grid';
	protected $primaryKey = 'entity_id';
	public $incrementing = false;

	protected $casts = [
		'entity_id' => 'int',
		'order_id' => 'int',
		'state' => 'int',
		'base_grand_total' => 'float',
		'store_id' => 'int',
		'customer_group_id' => 'int',
		'subtotal' => 'float',
		'shipping_and_handling' => 'float',
		'adjustment_positive' => 'float',
		'adjustment_negative' => 'float',
		'order_base_grand_total' => 'float'
	];

	protected $dates = [
		'order_created_at'
	];

	protected $fillable = [
		'increment_id',
		'order_id',
		'order_increment_id',
		'order_created_at',
		'billing_name',
		'state',
		'base_grand_total',
		'order_status',
		'store_id',
		'billing_address',
		'shipping_address',
		'customer_name',
		'customer_email',
		'customer_group_id',
		'payment_method',
		'shipping_information',
		'subtotal',
		'shipping_and_handling',
		'adjustment_positive',
		'adjustment_negative',
		'order_base_grand_total'
	];
}
