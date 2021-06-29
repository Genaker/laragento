<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReportEvent
 * 
 * @property int $event_id
 * @property Carbon $logged_at
 * @property int $event_type_id
 * @property int $object_id
 * @property int $subject_id
 * @property int $subtype
 * @property int $store_id
 * 
 * @property ReportEventType $report_event_type
 * @property Store $store
 *
 * @package Laragento\Models
 */
class ReportEvent extends Model
{
	protected $table = 'report_event';
	protected $primaryKey = 'event_id';
	public $timestamps = false;

	protected $casts = [
		'event_type_id' => 'int',
		'object_id' => 'int',
		'subject_id' => 'int',
		'subtype' => 'int',
		'store_id' => 'int'
	];

	protected $dates = [
		'logged_at'
	];

	protected $fillable = [
		'logged_at',
		'event_type_id',
		'object_id',
		'subject_id',
		'subtype',
		'store_id'
	];

	public function report_event_type()
	{
		return $this->belongsTo(ReportEventType::class, 'event_type_id');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
