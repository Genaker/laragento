<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QueueMessage
 * 
 * @property int $id
 * @property string|null $topic_name
 * @property string|null $body
 * 
 * @property Collection|QueueMessageStatus[] $queue_message_statuses
 *
 * @package Laragento\Models
 */
class QueueMessage extends Model
{
	protected $table = 'queue_message';
	public $timestamps = false;

	protected $fillable = [
		'topic_name',
		'body'
	];

	public function queue_message_statuses()
	{
		return $this->hasMany(QueueMessageStatus::class, 'message_id');
	}
}
