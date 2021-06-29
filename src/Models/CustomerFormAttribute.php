<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerFormAttribute
 * 
 * @property string $form_code
 * @property int $attribute_id
 * 
 * @property EavAttribute $eav_attribute
 *
 * @package Laragento\Models
 */
class CustomerFormAttribute extends Model
{
	protected $table = 'customer_form_attribute';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'attribute_id' => 'int'
	];

	public function eav_attribute()
	{
		return $this->belongsTo(EavAttribute::class, 'attribute_id');
	}
}
