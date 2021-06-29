<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Catalogrule
 * 
 * @property int $rule_id
 * @property string|null $name
 * @property string|null $description
 * @property Carbon|null $from_date
 * @property Carbon|null $to_date
 * @property int $is_active
 * @property string|null $conditions_serialized
 * @property string|null $actions_serialized
 * @property int $stop_rules_processing
 * @property int $sort_order
 * @property string|null $simple_action
 * @property float $discount_amount
 * 
 * @property Collection|CustomerGroup[] $customer_groups
 * @property Collection|CatalogruleWebsite[] $catalogrule_websites
 *
 * @package Laragento\Models
 */
class Catalogrule extends Model
{
	protected $table = 'catalogrule';
	protected $primaryKey = 'rule_id';
	public $timestamps = false;

	protected $casts = [
		'is_active' => 'int',
		'stop_rules_processing' => 'int',
		'sort_order' => 'int',
		'discount_amount' => 'float'
	];

	protected $dates = [
		'from_date',
		'to_date'
	];

	protected $fillable = [
		'name',
		'description',
		'from_date',
		'to_date',
		'is_active',
		'conditions_serialized',
		'actions_serialized',
		'stop_rules_processing',
		'sort_order',
		'simple_action',
		'discount_amount'
	];

	public function customer_groups()
	{
		return $this->belongsToMany(CustomerGroup::class, 'catalogrule_customer_group', 'rule_id');
	}

	public function catalogrule_websites()
	{
		return $this->hasMany(CatalogruleWebsite::class, 'rule_id');
	}
}
