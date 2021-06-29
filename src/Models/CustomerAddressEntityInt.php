<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerAddressEntityInt
 * 
 * @property int $value_id
 * @property int $attribute_id
 * @property int $entity_id
 * @property int $value
 * 
 * @property EavAttribute $eav_attribute
 * @property CustomerAddressEntity $customer_address_entity
 *
 * @package Laragento\Models
 */
class CustomerAddressEntityInt extends Model
{
	protected $table = 'customer_address_entity_int';
	protected $primaryKey = 'value_id';
	public $timestamps = false;

	protected $casts = [
		'attribute_id' => 'int',
		'entity_id' => 'int',
		'value' => 'int'
	];

	protected $fillable = [
		'attribute_id',
		'entity_id',
		'value'
	];

	public function eav_attribute()
	{
		return $this->belongsTo(EavAttribute::class, 'attribute_id');
	}

	public function customer_address_entity()
	{
		return $this->belongsTo(CustomerAddressEntity::class, 'entity_id');
	}
}
