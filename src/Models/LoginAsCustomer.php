<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LoginAsCustomer
 * 
 * @property string $secret
 * @property int $customer_id
 * @property int $admin_id
 * @property Carbon|null $created_at
 *
 * @package Laragento\Models
 */
class LoginAsCustomer extends Model
{
	protected $table = 'login_as_customer';
	protected $primaryKey = 'secret';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'customer_id' => 'int',
		'admin_id' => 'int'
	];

	protected $hidden = [
		'secret'
	];

	protected $fillable = [
		'customer_id',
		'admin_id'
	];
}
