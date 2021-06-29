<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CataloginventoryStockStatusTmp
 * 
 * @property int $product_id
 * @property int $website_id
 * @property int $stock_id
 * @property float $qty
 * @property int $stock_status
 *
 * @package Laragento\Models
 */
class CataloginventoryStockStatusTmp extends Model
{
	protected $table = 'cataloginventory_stock_status_tmp';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'website_id' => 'int',
		'stock_id' => 'int',
		'qty' => 'float',
		'stock_status' => 'int'
	];

	protected $fillable = [
		'qty',
		'stock_status'
	];
}
