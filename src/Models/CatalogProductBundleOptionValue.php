<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductBundleOptionValue
 * 
 * @property int $value_id
 * @property int $option_id
 * @property int $store_id
 * @property string|null $title
 * @property int $parent_product_id
 * 
 * @property CatalogProductBundleOption $catalog_product_bundle_option
 *
 * @package Laragento\Models
 */
class CatalogProductBundleOptionValue extends Model
{
	protected $table = 'catalog_product_bundle_option_value';
	protected $primaryKey = 'value_id';
	public $timestamps = false;

	protected $casts = [
		'option_id' => 'int',
		'store_id' => 'int',
		'parent_product_id' => 'int'
	];

	protected $fillable = [
		'option_id',
		'store_id',
		'title',
		'parent_product_id'
	];

	public function catalog_product_bundle_option()
	{
		return $this->belongsTo(CatalogProductBundleOption::class, 'option_id');
	}
}
