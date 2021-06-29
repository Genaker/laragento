<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductOptionTypeTitle
 * 
 * @property int $option_type_title_id
 * @property int $option_type_id
 * @property int $store_id
 * @property string|null $title
 * 
 * @property Store $store
 * @property CatalogProductOptionTypeValue $catalog_product_option_type_value
 *
 * @package Laragento\Models
 */
class CatalogProductOptionTypeTitle extends Model
{
	protected $table = 'catalog_product_option_type_title';
	protected $primaryKey = 'option_type_title_id';
	public $timestamps = false;

	protected $casts = [
		'option_type_id' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'option_type_id',
		'store_id',
		'title'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function catalog_product_option_type_value()
	{
		return $this->belongsTo(CatalogProductOptionTypeValue::class, 'option_type_id');
	}
}
