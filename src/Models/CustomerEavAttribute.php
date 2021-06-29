<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerEavAttribute
 * 
 * @property int $attribute_id
 * @property int $is_visible
 * @property string|null $input_filter
 * @property int $multiline_count
 * @property string|null $validate_rules
 * @property int $is_system
 * @property int $sort_order
 * @property string|null $data_model
 * @property int $is_used_in_grid
 * @property int $is_visible_in_grid
 * @property int $is_filterable_in_grid
 * @property int $is_searchable_in_grid
 * 
 * @property EavAttribute $eav_attribute
 *
 * @package Laragento\Models
 */
class CustomerEavAttribute extends Model
{
	protected $table = 'customer_eav_attribute';
	protected $primaryKey = 'attribute_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'attribute_id' => 'int',
		'is_visible' => 'int',
		'multiline_count' => 'int',
		'is_system' => 'int',
		'sort_order' => 'int',
		'is_used_in_grid' => 'int',
		'is_visible_in_grid' => 'int',
		'is_filterable_in_grid' => 'int',
		'is_searchable_in_grid' => 'int'
	];

	protected $fillable = [
		'is_visible',
		'input_filter',
		'multiline_count',
		'validate_rules',
		'is_system',
		'sort_order',
		'data_model',
		'is_used_in_grid',
		'is_visible_in_grid',
		'is_filterable_in_grid',
		'is_searchable_in_grid'
	];

	public function eav_attribute()
	{
		return $this->belongsTo(EavAttribute::class, 'attribute_id');
	}
}
