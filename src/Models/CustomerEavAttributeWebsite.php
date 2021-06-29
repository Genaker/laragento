<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerEavAttributeWebsite
 * 
 * @property int $attribute_id
 * @property int $website_id
 * @property int|null $is_visible
 * @property int|null $is_required
 * @property string|null $default_value
 * @property int|null $multiline_count
 * 
 * @property EavAttribute $eav_attribute
 * @property StoreWebsite $store_website
 *
 * @package Laragento\Models
 */
class CustomerEavAttributeWebsite extends Model
{
	protected $table = 'customer_eav_attribute_website';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'attribute_id' => 'int',
		'website_id' => 'int',
		'is_visible' => 'int',
		'is_required' => 'int',
		'multiline_count' => 'int'
	];

	protected $fillable = [
		'is_visible',
		'is_required',
		'default_value',
		'multiline_count'
	];

	public function eav_attribute()
	{
		return $this->belongsTo(EavAttribute::class, 'attribute_id');
	}

	public function store_website()
	{
		return $this->belongsTo(StoreWebsite::class, 'website_id');
	}
}
