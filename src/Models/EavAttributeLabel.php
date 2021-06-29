<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EavAttributeLabel
 * 
 * @property int $attribute_label_id
 * @property int $attribute_id
 * @property int $store_id
 * @property string|null $value
 * 
 * @property EavAttribute $eav_attribute
 * @property Store $store
 *
 * @package Laragento\Models
 */
class EavAttributeLabel extends Model
{
	protected $table = 'eav_attribute_label';
	protected $primaryKey = 'attribute_label_id';
	public $timestamps = false;

	protected $casts = [
		'attribute_id' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'attribute_id',
		'store_id',
		'value'
	];

	public function eav_attribute()
	{
		return $this->belongsTo(EavAttribute::class, 'attribute_id');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
