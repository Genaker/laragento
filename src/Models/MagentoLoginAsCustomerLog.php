<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MagentoLoginAsCustomerLog
 * 
 * @property int $log_id
 * @property Carbon|null $time
 * @property int|null $user_id
 * @property string|null $user_name
 * @property int|null $customer_id
 * @property string|null $customer_email
 *
 * @package Laragento\Models
 */
class MagentoLoginAsCustomerLog extends Model
{
	protected $table = 'magento_login_as_customer_log';
	protected $primaryKey = 'log_id';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'customer_id' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'time',
		'user_id',
		'user_name',
		'customer_id',
		'customer_email'
	];
}
