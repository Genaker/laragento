<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesOrderStatusLabel
 * 
 * @property string $status
 * @property int $store_id
 * @property string $label
 * 
 * @property SalesOrderStatus $sales_order_status
 * @property Store $store
 *
 * @package Laragento\Models
 */
class SalesOrderStatusLabel extends Model
{
	protected $table = 'sales_order_status_label';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'store_id' => 'int'
	];

	protected $fillable = [
		'label'
	];

	public function sales_order_status()
	{
		return $this->belongsTo(SalesOrderStatus::class, 'status');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
