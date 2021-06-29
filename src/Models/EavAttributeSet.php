<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EavAttributeSet
 * 
 * @property int $attribute_set_id
 * @property int $entity_type_id
 * @property string|null $attribute_set_name
 * @property int $sort_order
 * 
 * @property EavEntityType $eav_entity_type
 * @property Collection|EavAttributeGroup[] $eav_attribute_groups
 *
 * @package Laragento\Models
 */
class EavAttributeSet extends Model
{
	protected $table = 'eav_attribute_set';
	protected $primaryKey = 'attribute_set_id';
	public $timestamps = false;

	protected $casts = [
		'entity_type_id' => 'int',
		'sort_order' => 'int'
	];

	protected $fillable = [
		'entity_type_id',
		'attribute_set_name',
		'sort_order'
	];

	public function eav_entity_type()
	{
		return $this->belongsTo(EavEntityType::class, 'entity_type_id');
	}

	public function eav_attribute_groups()
	{
		return $this->hasMany(EavAttributeGroup::class, 'attribute_set_id');
	}
}
