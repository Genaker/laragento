<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesOrderTaxItem
 * 
 * @property int $tax_item_id
 * @property int $tax_id
 * @property int|null $item_id
 * @property float $tax_percent
 * @property float $amount
 * @property float $base_amount
 * @property float $real_amount
 * @property float $real_base_amount
 * @property int|null $associated_item_id
 * @property string $taxable_item_type
 * 
 * @property SalesOrderItem|null $sales_order_item
 * @property SalesOrderTax $sales_order_tax
 *
 * @package Laragento\Models
 */
class SalesOrderTaxItem extends Model
{
	protected $table = 'sales_order_tax_item';
	protected $primaryKey = 'tax_item_id';
	public $timestamps = false;

	protected $casts = [
		'tax_id' => 'int',
		'item_id' => 'int',
		'tax_percent' => 'float',
		'amount' => 'float',
		'base_amount' => 'float',
		'real_amount' => 'float',
		'real_base_amount' => 'float',
		'associated_item_id' => 'int'
	];

	protected $fillable = [
		'tax_id',
		'item_id',
		'tax_percent',
		'amount',
		'base_amount',
		'real_amount',
		'real_base_amount',
		'associated_item_id',
		'taxable_item_type'
	];

	public function sales_order_item()
	{
		return $this->belongsTo(SalesOrderItem::class, 'item_id');
	}

	public function sales_order_tax()
	{
		return $this->belongsTo(SalesOrderTax::class, 'tax_id');
	}
}
