<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesShipmentComment
 * 
 * @property int $entity_id
 * @property int $parent_id
 * @property int|null $is_customer_notified
 * @property int $is_visible_on_front
 * @property string|null $comment
 * @property Carbon $created_at
 * 
 * @property SalesShipment $sales_shipment
 *
 * @package Laragento\Models
 */
class SalesShipmentComment extends Model
{
	protected $table = 'sales_shipment_comment';
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

	public function sales_shipment()
	{
		return $this->belongsTo(SalesShipment::class, 'parent_id');
	}
}
