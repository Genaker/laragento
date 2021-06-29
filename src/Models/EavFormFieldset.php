<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EavFormFieldset
 * 
 * @property int $fieldset_id
 * @property int $type_id
 * @property string $code
 * @property int $sort_order
 * 
 * @property EavFormType $eav_form_type
 * @property Collection|EavFormElement[] $eav_form_elements
 * @property Collection|EavFormFieldsetLabel[] $eav_form_fieldset_labels
 *
 * @package Laragento\Models
 */
class EavFormFieldset extends Model
{
	protected $table = 'eav_form_fieldset';
	protected $primaryKey = 'fieldset_id';
	public $timestamps = false;

	protected $casts = [
		'type_id' => 'int',
		'sort_order' => 'int'
	];

	protected $fillable = [
		'type_id',
		'code',
		'sort_order'
	];

	public function eav_form_type()
	{
		return $this->belongsTo(EavFormType::class, 'type_id');
	}

	public function eav_form_elements()
	{
		return $this->hasMany(EavFormElement::class, 'fieldset_id');
	}

	public function eav_form_fieldset_labels()
	{
		return $this->hasMany(EavFormFieldsetLabel::class, 'fieldset_id');
	}
}
