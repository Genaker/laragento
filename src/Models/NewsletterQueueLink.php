<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NewsletterQueueLink
 * 
 * @property int $queue_link_id
 * @property int $queue_id
 * @property int $subscriber_id
 * @property Carbon|null $letter_sent_at
 * 
 * @property NewsletterQueue $newsletter_queue
 * @property NewsletterSubscriber $newsletter_subscriber
 *
 * @package Laragento\Models
 */
class NewsletterQueueLink extends Model
{
	protected $table = 'newsletter_queue_link';
	protected $primaryKey = 'queue_link_id';
	public $timestamps = false;

	protected $casts = [
		'queue_id' => 'int',
		'subscriber_id' => 'int'
	];

	protected $dates = [
		'letter_sent_at'
	];

	protected $fillable = [
		'queue_id',
		'subscriber_id',
		'letter_sent_at'
	];

	public function newsletter_queue()
	{
		return $this->belongsTo(NewsletterQueue::class, 'queue_id');
	}

	public function newsletter_subscriber()
	{
		return $this->belongsTo(NewsletterSubscriber::class, 'subscriber_id');
	}
}
