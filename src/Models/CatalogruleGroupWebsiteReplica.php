<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogruleGroupWebsiteReplica
 * 
 * @property int $rule_id
 * @property int $customer_group_id
 * @property int $website_id
 *
 * @package Laragento\Models
 */
class CatalogruleGroupWebsiteReplica extends Model
{
	protected $table = 'catalogrule_group_website_replica';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'rule_id' => 'int',
		'customer_group_id' => 'int',
		'website_id' => 'int'
	];
}
