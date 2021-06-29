<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CronSchedule
 * 
 * @property int $schedule_id
 * @property string $job_code
 * @property string $status
 * @property string|null $messages
 * @property Carbon $created_at
 * @property Carbon|null $scheduled_at
 * @property Carbon|null $executed_at
 * @property Carbon|null $finished_at
 *
 * @package Laragento\Models
 */
class CronSchedule extends Model
{
	protected $table = 'cron_schedule';
	protected $primaryKey = 'schedule_id';
	public $timestamps = false;

	protected $dates = [
		'scheduled_at',
		'executed_at',
		'finished_at'
	];

	protected $fillable = [
		'job_code',
		'status',
		'messages',
		'scheduled_at',
		'executed_at',
		'finished_at'
	];
}
