<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogruleWebsite
 * 
 * @property int $rule_id
 * @property int $website_id
 * 
 * @property Catalogrule $catalogrule
 * @property StoreWebsite $store_website
 *
 * @package Laragento\Models
 */
class CatalogruleWebsite extends Model
{
	protected $table = 'catalogrule_website';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'rule_id' => 'int',
		'website_id' => 'int'
	];

	public function catalogrule()
	{
		return $this->belongsTo(Catalogrule::class, 'rule_id');
	}

	public function store_website()
	{
		return $this->belongsTo(StoreWebsite::class, 'website_id');
	}
}
