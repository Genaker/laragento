<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductLinkType
 * 
 * @property int $link_type_id
 * @property string|null $code
 * 
 * @property Collection|CatalogProductLink[] $catalog_product_links
 * @property Collection|CatalogProductLinkAttribute[] $catalog_product_link_attributes
 *
 * @package Laragento\Models
 */
class CatalogProductLinkType extends Model
{
	protected $table = 'catalog_product_link_type';
	protected $primaryKey = 'link_type_id';
	public $timestamps = false;

	protected $fillable = [
		'code'
	];

	public function catalog_product_links()
	{
		return $this->hasMany(CatalogProductLink::class, 'link_type_id');
	}

	public function catalog_product_link_attributes()
	{
		return $this->hasMany(CatalogProductLinkAttribute::class, 'link_type_id');
	}
}
