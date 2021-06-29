<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EavEntityAttribute
 * 
 * @property int $entity_attribute_id
 * @property int $entity_type_id
 * @property int $attribute_set_id
 * @property int $attribute_group_id
 * @property int $attribute_id
 * @property int $sort_order
 * 
 * @property EavAttribute $eav_attribute
 * @property EavAttributeGroup $eav_attribute_group
 *
 * @package Laragento\Models
 */
class EavEntityAttribute extends Model
{
	protected $table = 'eav_entity_attribute';
	protected $primaryKey = 'entity_attribute_id';
	public $timestamps = false;

	protected $casts = [
		'entity_type_id' => 'int',
		'attribute_set_id' => 'int',
		'attribute_group_id' => 'int',
		'attribute_id' => 'int',
		'sort_order' => 'int'
	];

	protected $fillable = [
		'entity_type_id',
		'attribute_set_id',
		'attribute_group_id',
		'attribute_id',
		'sort_order'
	];

	public function eav_attribute()
	{
		return $this->belongsTo(EavAttribute::class, 'attribute_id');
	}

	public function eav_attribute_group()
	{
		return $this->belongsTo(EavAttributeGroup::class, 'attribute_group_id');
	}
}
