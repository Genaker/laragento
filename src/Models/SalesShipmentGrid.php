<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesShipmentGrid
 * 
 * @property int $entity_id
 * @property string|null $increment_id
 * @property int|null $store_id
 * @property string $order_increment_id
 * @property int $order_id
 * @property Carbon $order_created_at
 * @property string $customer_name
 * @property float|null $total_qty
 * @property int|null $shipment_status
 * @property string|null $order_status
 * @property string|null $billing_address
 * @property string|null $shipping_address
 * @property string|null $billing_name
 * @property string|null $shipping_name
 * @property string|null $customer_email
 * @property int|null $customer_group_id
 * @property string|null $payment_method
 * @property string|null $shipping_information
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package Laragento\Models
 */
class SalesShipmentGrid extends Model
{
	protected $table = 'sales_shipment_grid';
	protected $primaryKey = 'entity_id';
	public $incrementing = false;

	protected $casts = [
		'entity_id' => 'int',
		'store_id' => 'int',
		'order_id' => 'int',
		'total_qty' => 'float',
		'shipment_status' => 'int',
		'customer_group_id' => 'int'
	];

	protected $dates = [
		'order_created_at'
	];

	protected $fillable = [
		'increment_id',
		'store_id',
		'order_increment_id',
		'order_id',
		'order_created_at',
		'customer_name',
		'total_qty',
		'shipment_status',
		'order_status',
		'billing_address',
		'shipping_address',
		'billing_name',
		'shipping_name',
		'customer_email',
		'customer_group_id',
		'payment_method',
		'shipping_information'
	];
}
