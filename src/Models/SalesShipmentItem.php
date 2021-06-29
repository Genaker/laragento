<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesShipmentItem
 * 
 * @property int $entity_id
 * @property int $parent_id
 * @property float|null $row_total
 * @property float|null $price
 * @property float|null $weight
 * @property float|null $qty
 * @property int|null $product_id
 * @property int|null $order_item_id
 * @property string|null $additional_data
 * @property string|null $description
 * @property string|null $name
 * @property string|null $sku
 * 
 * @property SalesShipment $sales_shipment
 *
 * @package Laragento\Models
 */
class SalesShipmentItem extends Model
{
	protected $table = 'sales_shipment_item';
	protected $primaryKey = 'entity_id';
	public $timestamps = false;

	protected $casts = [
		'parent_id' => 'int',
		'row_total' => 'float',
		'price' => 'float',
		'weight' => 'float',
		'qty' => 'float',
		'product_id' => 'int',
		'order_item_id' => 'int'
	];

	protected $fillable = [
		'parent_id',
		'row_total',
		'price',
		'weight',
		'qty',
		'product_id',
		'order_item_id',
		'additional_data',
		'description',
		'name',
		'sku'
	];

	public function sales_shipment()
	{
		return $this->belongsTo(SalesShipment::class, 'parent_id');
	}
}
