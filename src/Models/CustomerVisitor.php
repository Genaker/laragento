<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerVisitor
 * 
 * @property int $visitor_id
 * @property int|null $customer_id
 * @property string|null $session_id
 * @property Carbon $last_visit_at
 *
 * @package Laragento\Models
 */
class CustomerVisitor extends Model
{
	protected $table = 'customer_visitor';
	protected $primaryKey = 'visitor_id';
	public $timestamps = false;

	protected $casts = [
		'customer_id' => 'int'
	];

	protected $dates = [
		'last_visit_at'
	];

	protected $fillable = [
		'customer_id',
		'session_id',
		'last_visit_at'
	];
}
