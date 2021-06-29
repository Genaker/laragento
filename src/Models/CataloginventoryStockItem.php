<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CataloginventoryStockItem
 * 
 * @property int $item_id
 * @property int $product_id
 * @property int $stock_id
 * @property float|null $qty
 * @property float $min_qty
 * @property int $use_config_min_qty
 * @property int $is_qty_decimal
 * @property int $backorders
 * @property int $use_config_backorders
 * @property float $min_sale_qty
 * @property int $use_config_min_sale_qty
 * @property float $max_sale_qty
 * @property int $use_config_max_sale_qty
 * @property int $is_in_stock
 * @property Carbon|null $low_stock_date
 * @property float|null $notify_stock_qty
 * @property int $use_config_notify_stock_qty
 * @property int $manage_stock
 * @property int $use_config_manage_stock
 * @property int $stock_status_changed_auto
 * @property int $use_config_qty_increments
 * @property float $qty_increments
 * @property int $use_config_enable_qty_inc
 * @property int $enable_qty_increments
 * @property int $is_decimal_divided
 * @property int $website_id
 * 
 * @property CatalogProductEntity $catalog_product_entity
 * @property CataloginventoryStock $cataloginventory_stock
 *
 * @package Laragento\Models
 */
class CataloginventoryStockItem extends Model
{
	protected $table = 'cataloginventory_stock_item';
	protected $primaryKey = 'item_id';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'stock_id' => 'int',
		'qty' => 'float',
		'min_qty' => 'float',
		'use_config_min_qty' => 'int',
		'is_qty_decimal' => 'int',
		'backorders' => 'int',
		'use_config_backorders' => 'int',
		'min_sale_qty' => 'float',
		'use_config_min_sale_qty' => 'int',
		'max_sale_qty' => 'float',
		'use_config_max_sale_qty' => 'int',
		'is_in_stock' => 'int',
		'notify_stock_qty' => 'float',
		'use_config_notify_stock_qty' => 'int',
		'manage_stock' => 'int',
		'use_config_manage_stock' => 'int',
		'stock_status_changed_auto' => 'int',
		'use_config_qty_increments' => 'int',
		'qty_increments' => 'float',
		'use_config_enable_qty_inc' => 'int',
		'enable_qty_increments' => 'int',
		'is_decimal_divided' => 'int',
		'website_id' => 'int'
	];

	protected $dates = [
		'low_stock_date'
	];

	protected $fillable = [
		'product_id',
		'stock_id',
		'qty',
		'min_qty',
		'use_config_min_qty',
		'is_qty_decimal',
		'backorders',
		'use_config_backorders',
		'min_sale_qty',
		'use_config_min_sale_qty',
		'max_sale_qty',
		'use_config_max_sale_qty',
		'is_in_stock',
		'low_stock_date',
		'notify_stock_qty',
		'use_config_notify_stock_qty',
		'manage_stock',
		'use_config_manage_stock',
		'stock_status_changed_auto',
		'use_config_qty_increments',
		'qty_increments',
		'use_config_enable_qty_inc',
		'enable_qty_increments',
		'is_decimal_divided',
		'website_id'
	];

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'product_id');
	}

	public function cataloginventory_stock()
	{
		return $this->belongsTo(CataloginventoryStock::class, 'stock_id');
	}
}
