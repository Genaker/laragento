<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LoginAsCustomerAssistanceAllowed
 * 
 * @property int $customer_id
 * 
 * @property CustomerEntity $customer_entity
 *
 * @package Laragento\Models
 */
class LoginAsCustomerAssistanceAllowed extends Model
{
	protected $table = 'login_as_customer_assistance_allowed';
	protected $primaryKey = 'customer_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'customer_id' => 'int'
	];

	public function customer_entity()
	{
		return $this->belongsTo(CustomerEntity::class, 'customer_id');
	}
}
