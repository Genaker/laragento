<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EavEntity
 * 
 * @property int $entity_id
 * @property int $entity_type_id
 * @property int $attribute_set_id
 * @property string|null $increment_id
 * @property int $parent_id
 * @property int $store_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $is_active
 * 
 * @property EavEntityType $eav_entity_type
 * @property Store $store
 * @property Collection|EavEntityDatetime[] $eav_entity_datetimes
 * @property Collection|EavEntityDecimal[] $eav_entity_decimals
 * @property Collection|EavEntityInt[] $eav_entity_ints
 * @property Collection|EavEntityText[] $eav_entity_texts
 * @property Collection|EavEntityVarchar[] $eav_entity_varchars
 *
 * @package Laragento\Models
 */
class EavEntity extends Model
{
	protected $table = 'eav_entity';
	protected $primaryKey = 'entity_id';

	protected $casts = [
		'entity_type_id' => 'int',
		'attribute_set_id' => 'int',
		'parent_id' => 'int',
		'store_id' => 'int',
		'is_active' => 'int'
	];

	protected $fillable = [
		'entity_type_id',
		'attribute_set_id',
		'increment_id',
		'parent_id',
		'store_id',
		'is_active'
	];

	public function eav_entity_type()
	{
		return $this->belongsTo(EavEntityType::class, 'entity_type_id');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function eav_entity_datetimes()
	{
		return $this->hasMany(EavEntityDatetime::class, 'entity_id');
	}

	public function eav_entity_decimals()
	{
		return $this->hasMany(EavEntityDecimal::class, 'entity_id');
	}

	public function eav_entity_ints()
	{
		return $this->hasMany(EavEntityInt::class, 'entity_id');
	}

	public function eav_entity_texts()
	{
		return $this->hasMany(EavEntityText::class, 'entity_id');
	}

	public function eav_entity_varchars()
	{
		return $this->hasMany(EavEntityVarchar::class, 'entity_id');
	}
}
