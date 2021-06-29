<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EavFormElement
 * 
 * @property int $element_id
 * @property int $type_id
 * @property int|null $fieldset_id
 * @property int $attribute_id
 * @property int $sort_order
 * 
 * @property EavAttribute $eav_attribute
 * @property EavFormFieldset|null $eav_form_fieldset
 * @property EavFormType $eav_form_type
 *
 * @package Laragento\Models
 */
class EavFormElement extends Model
{
	protected $table = 'eav_form_element';
	protected $primaryKey = 'element_id';
	public $timestamps = false;

	protected $casts = [
		'type_id' => 'int',
		'fieldset_id' => 'int',
		'attribute_id' => 'int',
		'sort_order' => 'int'
	];

	protected $fillable = [
		'type_id',
		'fieldset_id',
		'attribute_id',
		'sort_order'
	];

	public function eav_attribute()
	{
		return $this->belongsTo(EavAttribute::class, 'attribute_id');
	}

	public function eav_form_fieldset()
	{
		return $this->belongsTo(EavFormFieldset::class, 'fieldset_id');
	}

	public function eav_form_type()
	{
		return $this->belongsTo(EavFormType::class, 'type_id');
	}
}
