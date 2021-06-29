<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EavEntityText
 * 
 * @property int $value_id
 * @property int $entity_type_id
 * @property int $attribute_id
 * @property int $store_id
 * @property int $entity_id
 * @property string $value
 * 
 * @property EavEntity $eav_entity
 * @property EavEntityType $eav_entity_type
 * @property Store $store
 *
 * @package Laragento\Models
 */
class EavEntityText extends Model
{
	protected $table = 'eav_entity_text';
	protected $primaryKey = 'value_id';
	public $timestamps = false;

	protected $casts = [
		'entity_type_id' => 'int',
		'attribute_id' => 'int',
		'store_id' => 'int',
		'entity_id' => 'int'
	];

	protected $fillable = [
		'entity_type_id',
		'attribute_id',
		'store_id',
		'entity_id',
		'value'
	];

	public function eav_entity()
	{
		return $this->belongsTo(EavEntity::class, 'entity_id');
	}

	public function eav_entity_type()
	{
		return $this->belongsTo(EavEntityType::class, 'entity_type_id');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
