<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesShipmentTrack
 * 
 * @property int $entity_id
 * @property int $parent_id
 * @property float|null $weight
 * @property float|null $qty
 * @property int $order_id
 * @property string|null $track_number
 * @property string|null $description
 * @property string|null $title
 * @property string|null $carrier_code
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property SalesShipment $sales_shipment
 *
 * @package Laragento\Models
 */
class SalesShipmentTrack extends Model
{
	protected $table = 'sales_shipment_track';
	protected $primaryKey = 'entity_id';

	protected $casts = [
		'parent_id' => 'int',
		'weight' => 'float',
		'qty' => 'float',
		'order_id' => 'int'
	];

	protected $fillable = [
		'parent_id',
		'weight',
		'qty',
		'order_id',
		'track_number',
		'description',
		'title',
		'carrier_code'
	];

	public function sales_shipment()
	{
		return $this->belongsTo(SalesShipment::class, 'parent_id');
	}
}
