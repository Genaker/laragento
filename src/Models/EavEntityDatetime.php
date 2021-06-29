<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EavEntityDatetime
 * 
 * @property int $value_id
 * @property int $entity_type_id
 * @property int $attribute_id
 * @property int $store_id
 * @property int $entity_id
 * @property Carbon|null $value
 * 
 * @property EavEntity $eav_entity
 * @property Store $store
 * @property EavEntityType $eav_entity_type
 *
 * @package Laragento\Models
 */
class EavEntityDatetime extends Model
{
	protected $table = 'eav_entity_datetime';
	protected $primaryKey = 'value_id';
	public $timestamps = false;

	protected $casts = [
		'entity_type_id' => 'int',
		'attribute_id' => 'int',
		'store_id' => 'int',
		'entity_id' => 'int'
	];

	protected $dates = [
		'value'
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

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function eav_entity_type()
	{
		return $this->belongsTo(EavEntityType::class, 'entity_type_id');
	}
}
