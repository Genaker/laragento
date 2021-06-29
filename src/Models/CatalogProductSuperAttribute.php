<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductSuperAttribute
 * 
 * @property int $product_super_attribute_id
 * @property int $product_id
 * @property int $attribute_id
 * @property int $position
 * 
 * @property CatalogProductEntity $catalog_product_entity
 * @property Collection|CatalogProductSuperAttributeLabel[] $catalog_product_super_attribute_labels
 *
 * @package Laragento\Models
 */
class CatalogProductSuperAttribute extends Model
{
	protected $table = 'catalog_product_super_attribute';
	protected $primaryKey = 'product_super_attribute_id';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'attribute_id' => 'int',
		'position' => 'int'
	];

	protected $fillable = [
		'product_id',
		'attribute_id',
		'position'
	];

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'product_id');
	}

	public function catalog_product_super_attribute_labels()
	{
		return $this->hasMany(CatalogProductSuperAttributeLabel::class, 'product_super_attribute_id');
	}
}
