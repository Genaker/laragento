<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReportEventType
 * 
 * @property int $event_type_id
 * @property string $event_name
 * @property int $customer_login
 * 
 * @property Collection|ReportEvent[] $report_events
 *
 * @package Laragento\Models
 */
class ReportEventType extends Model
{
	protected $table = 'report_event_types';
	protected $primaryKey = 'event_type_id';
	public $timestamps = false;

	protected $casts = [
		'customer_login' => 'int'
	];

	protected $fillable = [
		'event_name',
		'customer_login'
	];

	public function report_events()
	{
		return $this->hasMany(ReportEvent::class, 'event_type_id');
	}
}
