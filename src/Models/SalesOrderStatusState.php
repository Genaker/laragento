<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesOrderStatusState
 * 
 * @property string $status
 * @property string $state
 * @property int $is_default
 * @property int $visible_on_front
 * 
 * @property SalesOrderStatus $sales_order_status
 *
 * @package Laragento\Models
 */
class SalesOrderStatusState extends Model
{
	protected $table = 'sales_order_status_state';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'is_default' => 'int',
		'visible_on_front' => 'int'
	];

	protected $fillable = [
		'is_default',
		'visible_on_front'
	];

	public function sales_order_status()
	{
		return $this->belongsTo(SalesOrderStatus::class, 'status');
	}
}
