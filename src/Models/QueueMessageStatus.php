<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QueueMessageStatus
 * 
 * @property int $id
 * @property int $queue_id
 * @property int $message_id
 * @property Carbon $updated_at
 * @property int $status
 * @property int $number_of_trials
 * 
 * @property QueueMessage $queue_message
 * @property Queue $queue
 *
 * @package Laragento\Models
 */
class QueueMessageStatus extends Model
{
	protected $table = 'queue_message_status';
	public $timestamps = false;

	protected $casts = [
		'queue_id' => 'int',
		'message_id' => 'int',
		'status' => 'int',
		'number_of_trials' => 'int'
	];

	protected $fillable = [
		'queue_id',
		'message_id',
		'status',
		'number_of_trials'
	];

	public function queue_message()
	{
		return $this->belongsTo(QueueMessage::class, 'message_id');
	}

	public function queue()
	{
		return $this->belongsTo(Queue::class);
	}
}
