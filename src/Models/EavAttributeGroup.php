<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EavAttributeGroup
 * 
 * @property int $attribute_group_id
 * @property int $attribute_set_id
 * @property string|null $attribute_group_name
 * @property int $sort_order
 * @property int|null $default_id
 * @property string $attribute_group_code
 * @property string|null $tab_group_code
 * 
 * @property EavAttributeSet $eav_attribute_set
 * @property Collection|EavEntityAttribute[] $eav_entity_attributes
 *
 * @package Laragento\Models
 */
class EavAttributeGroup extends Model
{
	protected $table = 'eav_attribute_group';
	protected $primaryKey = 'attribute_group_id';
	public $timestamps = false;

	protected $casts = [
		'attribute_set_id' => 'int',
		'sort_order' => 'int',
		'default_id' => 'int'
	];

	protected $fillable = [
		'attribute_set_id',
		'attribute_group_name',
		'sort_order',
		'default_id',
		'attribute_group_code',
		'tab_group_code'
	];

	public function eav_attribute_set()
	{
		return $this->belongsTo(EavAttributeSet::class, 'attribute_set_id');
	}

	public function eav_entity_attributes()
	{
		return $this->hasMany(EavEntityAttribute::class, 'attribute_group_id');
	}
}
