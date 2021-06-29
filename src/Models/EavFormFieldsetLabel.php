<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EavFormFieldsetLabel
 * 
 * @property int $fieldset_id
 * @property int $store_id
 * @property string $label
 * 
 * @property Store $store
 * @property EavFormFieldset $eav_form_fieldset
 *
 * @package Laragento\Models
 */
class EavFormFieldsetLabel extends Model
{
	protected $table = 'eav_form_fieldset_label';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'fieldset_id' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'label'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function eav_form_fieldset()
	{
		return $this->belongsTo(EavFormFieldset::class, 'fieldset_id');
	}
}
