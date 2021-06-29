<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerAddressEntityDatetime
 * 
 * @property int $value_id
 * @property int $attribute_id
 * @property int $entity_id
 * @property Carbon|null $value
 * 
 * @property EavAttribute $eav_attribute
 * @property CustomerAddressEntity $customer_address_entity
 *
 * @package Laragento\Models
 */
class CustomerAddressEntityDatetime extends Model
{
	protected $table = 'customer_address_entity_datetime';
	protected $primaryKey = 'value_id';
	public $timestamps = false;

	protected $casts = [
		'attribute_id' => 'int',
		'entity_id' => 'int'
	];

	protected $dates = [
		'value'
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
