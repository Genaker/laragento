<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesruleCustomer
 * 
 * @property int $rule_customer_id
 * @property int $rule_id
 * @property int $customer_id
 * @property int $times_used
 * 
 * @property CustomerEntity $customer_entity
 * @property Salesrule $salesrule
 *
 * @package Laragento\Models
 */
class SalesruleCustomer extends Model
{
	protected $table = 'salesrule_customer';
	protected $primaryKey = 'rule_customer_id';
	public $timestamps = false;

	protected $casts = [
		'rule_id' => 'int',
		'customer_id' => 'int',
		'times_used' => 'int'
	];

	protected $fillable = [
		'rule_id',
		'customer_id',
		'times_used'
	];

	public function customer_entity()
	{
		return $this->belongsTo(CustomerEntity::class, 'customer_id');
	}

	public function salesrule()
	{
		return $this->belongsTo(Salesrule::class, 'rule_id');
	}
}
