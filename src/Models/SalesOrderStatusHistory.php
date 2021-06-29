<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesOrderStatusHistory
 * 
 * @property int $entity_id
 * @property int $parent_id
 * @property int|null $is_customer_notified
 * @property int $is_visible_on_front
 * @property string|null $comment
 * @property string|null $status
 * @property Carbon $created_at
 * @property string|null $entity_name
 * 
 * @property SalesOrder $sales_order
 *
 * @package Laragento\Models
 */
class SalesOrderStatusHistory extends Model
{
	protected $table = 'sales_order_status_history';
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
		'comment',
		'status',
		'entity_name'
	];

	public function sales_order()
	{
		return $this->belongsTo(SalesOrder::class, 'parent_id');
	}
}
