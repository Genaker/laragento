<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ShippingTablerate
 * 
 * @property int $pk
 * @property int $website_id
 * @property string $dest_country_id
 * @property int $dest_region_id
 * @property string $dest_zip
 * @property string $condition_name
 * @property float $condition_value
 * @property float $price
 * @property float $cost
 *
 * @package Laragento\Models
 */
class ShippingTablerate extends Model
{
	protected $table = 'shipping_tablerate';
	protected $primaryKey = 'pk';
	public $timestamps = false;

	protected $casts = [
		'website_id' => 'int',
		'dest_region_id' => 'int',
		'condition_value' => 'float',
		'price' => 'float',
		'cost' => 'float'
	];

	protected $fillable = [
		'website_id',
		'dest_country_id',
		'dest_region_id',
		'dest_zip',
		'condition_name',
		'condition_value',
		'price',
		'cost'
	];
}
