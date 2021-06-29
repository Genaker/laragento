<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesOrderStatus
 * 
 * @property string $status
 * @property string $label
 * 
 * @property Collection|SalesOrderStatusLabel[] $sales_order_status_labels
 * @property Collection|SalesOrderStatusState[] $sales_order_status_states
 *
 * @package Laragento\Models
 */
class SalesOrderStatus extends Model
{
	protected $table = 'sales_order_status';
	protected $primaryKey = 'status';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'label'
	];

	public function sales_order_status_labels()
	{
		return $this->hasMany(SalesOrderStatusLabel::class, 'status');
	}

	public function sales_order_status_states()
	{
		return $this->hasMany(SalesOrderStatusState::class, 'status');
	}
}
