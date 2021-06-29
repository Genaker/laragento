<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogEavAttribute
 * 
 * @property int $attribute_id
 * @property string|null $frontend_input_renderer
 * @property int $is_global
 * @property int $is_visible
 * @property int $is_searchable
 * @property int $is_filterable
 * @property int $is_comparable
 * @property int $is_visible_on_front
 * @property int $is_html_allowed_on_front
 * @property int $is_used_for_price_rules
 * @property int $is_filterable_in_search
 * @property int $used_in_product_listing
 * @property int $used_for_sort_by
 * @property string|null $apply_to
 * @property int $is_visible_in_advanced_search
 * @property int $position
 * @property int $is_wysiwyg_enabled
 * @property int $is_used_for_promo_rules
 * @property int $is_required_in_admin_store
 * @property int $is_used_in_grid
 * @property int $is_visible_in_grid
 * @property int $is_filterable_in_grid
 * @property float $search_weight
 * @property string|null $additional_data
 * 
 * @property EavAttribute $eav_attribute
 *
 * @package Laragento\Models
 */
class CatalogEavAttribute extends Model
{
	protected $table = 'catalog_eav_attribute';
	protected $primaryKey = 'attribute_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'attribute_id' => 'int',
		'is_global' => 'int',
		'is_visible' => 'int',
		'is_searchable' => 'int',
		'is_filterable' => 'int',
		'is_comparable' => 'int',
		'is_visible_on_front' => 'int',
		'is_html_allowed_on_front' => 'int',
		'is_used_for_price_rules' => 'int',
		'is_filterable_in_search' => 'int',
		'used_in_product_listing' => 'int',
		'used_for_sort_by' => 'int',
		'is_visible_in_advanced_search' => 'int',
		'position' => 'int',
		'is_wysiwyg_enabled' => 'int',
		'is_used_for_promo_rules' => 'int',
		'is_required_in_admin_store' => 'int',
		'is_used_in_grid' => 'int',
		'is_visible_in_grid' => 'int',
		'is_filterable_in_grid' => 'int',
		'search_weight' => 'float'
	];

	protected $fillable = [
		'frontend_input_renderer',
		'is_global',
		'is_visible',
		'is_searchable',
		'is_filterable',
		'is_comparable',
		'is_visible_on_front',
		'is_html_allowed_on_front',
		'is_used_for_price_rules',
		'is_filterable_in_search',
		'used_in_product_listing',
		'used_for_sort_by',
		'apply_to',
		'is_visible_in_advanced_search',
		'position',
		'is_wysiwyg_enabled',
		'is_used_for_promo_rules',
		'is_required_in_admin_store',
		'is_used_in_grid',
		'is_visible_in_grid',
		'is_filterable_in_grid',
		'search_weight',
		'additional_data'
	];

	public function eav_attribute()
	{
		return $this->belongsTo(EavAttribute::class, 'attribute_id');
	}
}
