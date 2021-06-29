<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductOptionTitle
 * 
 * @property int $option_title_id
 * @property int $option_id
 * @property int $store_id
 * @property string|null $title
 * 
 * @property Store $store
 * @property CatalogProductOption $catalog_product_option
 *
 * @package Laragento\Models
 */
class CatalogProductOptionTitle extends Model
{
	protected $table = 'catalog_product_option_title';
	protected $primaryKey = 'option_title_id';
	public $timestamps = false;

	protected $casts = [
		'option_id' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'option_id',
		'store_id',
		'title'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function catalog_product_option()
	{
		return $this->belongsTo(CatalogProductOption::class, 'option_id');
	}
}
