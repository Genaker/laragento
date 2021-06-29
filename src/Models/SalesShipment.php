<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesShipment
 * 
 * @property int $entity_id
 * @property int|null $store_id
 * @property float|null $total_weight
 * @property float|null $total_qty
 * @property int|null $email_sent
 * @property int|null $send_email
 * @property int $order_id
 * @property int|null $customer_id
 * @property int|null $shipping_address_id
 * @property int|null $billing_address_id
 * @property int|null $shipment_status
 * @property string|null $increment_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $packages
 * @property mediumblob|null $shipping_label
 * @property string|null $customer_note
 * @property int|null $customer_note_notify
 * 
 * @property SalesOrder $sales_order
 * @property Store|null $store
 * @property Collection|SalesShipmentComment[] $sales_shipment_comments
 * @property Collection|SalesShipmentItem[] $sales_shipment_items
 * @property Collection|SalesShipmentTrack[] $sales_shipment_tracks
 *
 * @package Laragento\Models
 */
class SalesShipment extends Model
{
	protected $table = 'sales_shipment';
	protected $primaryKey = 'entity_id';

	protected $casts = [
		'store_id' => 'int',
		'total_weight' => 'float',
		'total_qty' => 'float',
		'email_sent' => 'int',
		'send_email' => 'int',
		'order_id' => 'int',
		'customer_id' => 'int',
		'shipping_address_id' => 'int',
		'billing_address_id' => 'int',
		'shipment_status' => 'int',
		'shipping_label' => 'mediumblob',
		'customer_note_notify' => 'int'
	];

	protected $fillable = [
		'store_id',
		'total_weight',
		'total_qty',
		'email_sent',
		'send_email',
		'order_id',
		'customer_id',
		'shipping_address_id',
		'billing_address_id',
		'shipment_status',
		'increment_id',
		'packages',
		'shipping_label',
		'customer_note',
		'customer_note_notify'
	];

	public function sales_order()
	{
		return $this->belongsTo(SalesOrder::class, 'order_id');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function sales_shipment_comments()
	{
		return $this->hasMany(SalesShipmentComment::class, 'parent_id');
	}

	public function sales_shipment_items()
	{
		return $this->hasMany(SalesShipmentItem::class, 'parent_id');
	}

	public function sales_shipment_tracks()
	{
		return $this->hasMany(SalesShipmentTrack::class, 'parent_id');
	}
}
