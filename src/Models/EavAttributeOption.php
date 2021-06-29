<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EavAttributeOption
 * 
 * @property int $option_id
 * @property int $attribute_id
 * @property int $sort_order
 * 
 * @property EavAttribute $eav_attribute
 * @property Collection|EavAttributeOptionSwatch[] $eav_attribute_option_swatches
 * @property Collection|EavAttributeOptionValue[] $eav_attribute_option_values
 *
 * @package Laragento\Models
 */
class EavAttributeOption extends Model
{
	protected $table = 'eav_attribute_option';
	protected $primaryKey = 'option_id';
	public $timestamps = false;

	protected $casts = [
		'attribute_id' => 'int',
		'sort_order' => 'int'
	];

	protected $fillable = [
		'attribute_id',
		'sort_order'
	];

	public function eav_attribute()
	{
		return $this->belongsTo(EavAttribute::class, 'attribute_id');
	}

	public function eav_attribute_option_swatches()
	{
		return $this->hasMany(EavAttributeOptionSwatch::class, 'option_id');
	}

	public function eav_attribute_option_values()
	{
		return $this->hasMany(EavAttributeOptionValue::class, 'option_id');
	}
}
