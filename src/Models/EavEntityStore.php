<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EavEntityStore
 * 
 * @property int $entity_store_id
 * @property int $entity_type_id
 * @property int $store_id
 * @property string|null $increment_prefix
 * @property string|null $increment_last_id
 * 
 * @property EavEntityType $eav_entity_type
 * @property Store $store
 *
 * @package Laragento\Models
 */
class EavEntityStore extends Model
{
	protected $table = 'eav_entity_store';
	protected $primaryKey = 'entity_store_id';
	public $timestamps = false;

	protected $casts = [
		'entity_type_id' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'entity_type_id',
		'store_id',
		'increment_prefix',
		'increment_last_id'
	];

	public function eav_entity_type()
	{
		return $this->belongsTo(EavEntityType::class, 'entity_type_id');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
