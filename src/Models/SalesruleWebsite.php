<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesruleWebsite
 * 
 * @property int $rule_id
 * @property int $website_id
 * 
 * @property Salesrule $salesrule
 * @property StoreWebsite $store_website
 *
 * @package Laragento\Models
 */
class SalesruleWebsite extends Model
{
	protected $table = 'salesrule_website';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'rule_id' => 'int',
		'website_id' => 'int'
	];

	public function salesrule()
	{
		return $this->belongsTo(Salesrule::class, 'rule_id');
	}

	public function store_website()
	{
		return $this->belongsTo(StoreWebsite::class, 'website_id');
	}
}
