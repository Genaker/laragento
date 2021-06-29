<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EavFormType
 * 
 * @property int $type_id
 * @property string $code
 * @property string $label
 * @property int $is_system
 * @property string|null $theme
 * @property int $store_id
 * 
 * @property Store $store
 * @property Collection|EavFormElement[] $eav_form_elements
 * @property Collection|EavFormFieldset[] $eav_form_fieldsets
 * @property Collection|EavFormTypeEntity[] $eav_form_type_entities
 *
 * @package Laragento\Models
 */
class EavFormType extends Model
{
	protected $table = 'eav_form_type';
	protected $primaryKey = 'type_id';
	public $timestamps = false;

	protected $casts = [
		'is_system' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'code',
		'label',
		'is_system',
		'theme',
		'store_id'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function eav_form_elements()
	{
		return $this->hasMany(EavFormElement::class, 'type_id');
	}

	public function eav_form_fieldsets()
	{
		return $this->hasMany(EavFormFieldset::class, 'type_id');
	}

	public function eav_form_type_entities()
	{
		return $this->hasMany(EavFormTypeEntity::class, 'type_id');
	}
}
