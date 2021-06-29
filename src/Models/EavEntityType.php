<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EavEntityType
 * 
 * @property int $entity_type_id
 * @property string $entity_type_code
 * @property string $entity_model
 * @property string|null $attribute_model
 * @property string|null $entity_table
 * @property string|null $value_table_prefix
 * @property string|null $entity_id_field
 * @property int $is_data_sharing
 * @property string|null $data_sharing_key
 * @property int $default_attribute_set_id
 * @property string|null $increment_model
 * @property int $increment_per_store
 * @property int $increment_pad_length
 * @property string $increment_pad_char
 * @property string|null $additional_attribute_table
 * @property string|null $entity_attribute_collection
 * 
 * @property Collection|EavAttribute[] $eav_attributes
 * @property Collection|EavAttributeSet[] $eav_attribute_sets
 * @property Collection|EavEntity[] $eav_entities
 * @property Collection|EavEntityDatetime[] $eav_entity_datetimes
 * @property Collection|EavEntityDecimal[] $eav_entity_decimals
 * @property Collection|EavEntityInt[] $eav_entity_ints
 * @property Collection|EavEntityStore[] $eav_entity_stores
 * @property Collection|EavEntityText[] $eav_entity_texts
 * @property Collection|EavEntityVarchar[] $eav_entity_varchars
 * @property Collection|EavFormTypeEntity[] $eav_form_type_entities
 *
 * @package Laragento\Models
 */
class EavEntityType extends Model
{
	protected $table = 'eav_entity_type';
	protected $primaryKey = 'entity_type_id';
	public $timestamps = false;

	protected $casts = [
		'is_data_sharing' => 'int',
		'default_attribute_set_id' => 'int',
		'increment_per_store' => 'int',
		'increment_pad_length' => 'int'
	];

	protected $fillable = [
		'entity_type_code',
		'entity_model',
		'attribute_model',
		'entity_table',
		'value_table_prefix',
		'entity_id_field',
		'is_data_sharing',
		'data_sharing_key',
		'default_attribute_set_id',
		'increment_model',
		'increment_per_store',
		'increment_pad_length',
		'increment_pad_char',
		'additional_attribute_table',
		'entity_attribute_collection'
	];

	public function eav_attributes()
	{
		return $this->hasMany(EavAttribute::class, 'entity_type_id');
	}

	public function eav_attribute_sets()
	{
		return $this->hasMany(EavAttributeSet::class, 'entity_type_id');
	}

	public function eav_entities()
	{
		return $this->hasMany(EavEntity::class, 'entity_type_id');
	}

	public function eav_entity_datetimes()
	{
		return $this->hasMany(EavEntityDatetime::class, 'entity_type_id');
	}

	public function eav_entity_decimals()
	{
		return $this->hasMany(EavEntityDecimal::class, 'entity_type_id');
	}

	public function eav_entity_ints()
	{
		return $this->hasMany(EavEntityInt::class, 'entity_type_id');
	}

	public function eav_entity_stores()
	{
		return $this->hasMany(EavEntityStore::class, 'entity_type_id');
	}

	public function eav_entity_texts()
	{
		return $this->hasMany(EavEntityText::class, 'entity_type_id');
	}

	public function eav_entity_varchars()
	{
		return $this->hasMany(EavEntityVarchar::class, 'entity_type_id');
	}

	public function eav_form_type_entities()
	{
		return $this->hasMany(EavFormTypeEntity::class, 'entity_type_id');
	}
}
