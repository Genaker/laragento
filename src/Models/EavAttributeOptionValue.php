<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EavAttributeOptionValue
 * 
 * @property int $value_id
 * @property int $option_id
 * @property int $store_id
 * @property string|null $value
 * 
 * @property Store $store
 * @property EavAttributeOption $eav_attribute_option
 *
 * @package Laragento\Models
 */
class EavAttributeOptionValue extends Model
{
	protected $table = 'eav_attribute_option_value';
	protected $primaryKey = 'value_id';
	public $timestamps = false;

	protected $casts = [
		'option_id' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'option_id',
		'store_id',
		'value'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function eav_attribute_option()
	{
		return $this->belongsTo(EavAttributeOption::class, 'option_id');
	}
}
