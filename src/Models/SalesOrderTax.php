<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesOrderTax
 * 
 * @property int $tax_id
 * @property int $order_id
 * @property string|null $code
 * @property string|null $title
 * @property float|null $percent
 * @property float|null $amount
 * @property int $priority
 * @property int $position
 * @property float|null $base_amount
 * @property int $process
 * @property float|null $base_real_amount
 * 
 * @property Collection|SalesOrderTaxItem[] $sales_order_tax_items
 *
 * @package Laragento\Models
 */
class SalesOrderTax extends Model
{
	protected $table = 'sales_order_tax';
	protected $primaryKey = 'tax_id';
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int',
		'percent' => 'float',
		'amount' => 'float',
		'priority' => 'int',
		'position' => 'int',
		'base_amount' => 'float',
		'process' => 'int',
		'base_real_amount' => 'float'
	];

	protected $fillable = [
		'order_id',
		'code',
		'title',
		'percent',
		'amount',
		'priority',
		'position',
		'base_amount',
		'process',
		'base_real_amount'
	];

	public function sales_order_tax_items()
	{
		return $this->hasMany(SalesOrderTaxItem::class, 'tax_id');
	}
}
