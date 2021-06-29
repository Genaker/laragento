<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EavFormTypeEntity
 * 
 * @property int $type_id
 * @property int $entity_type_id
 * 
 * @property EavFormType $eav_form_type
 * @property EavEntityType $eav_entity_type
 *
 * @package Laragento\Models
 */
class EavFormTypeEntity extends Model
{
	protected $table = 'eav_form_type_entity';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'type_id' => 'int',
		'entity_type_id' => 'int'
	];

	public function eav_form_type()
	{
		return $this->belongsTo(EavFormType::class, 'type_id');
	}

	public function eav_entity_type()
	{
		return $this->belongsTo(EavEntityType::class, 'entity_type_id');
	}
}
