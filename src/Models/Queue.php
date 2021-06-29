<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Queue
 * 
 * @property int $id
 * @property string|null $name
 * 
 * @property Collection|QueueMessageStatus[] $queue_message_statuses
 *
 * @package Laragento\Models
 */
class Queue extends Model
{
	protected $table = 'queue';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function queue_message_statuses()
	{
		return $this->hasMany(QueueMessageStatus::class);
	}
}
