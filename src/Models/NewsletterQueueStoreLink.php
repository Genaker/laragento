<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NewsletterQueueStoreLink
 * 
 * @property int $queue_id
 * @property int $store_id
 * 
 * @property NewsletterQueue $newsletter_queue
 * @property Store $store
 *
 * @package Laragento\Models
 */
class NewsletterQueueStoreLink extends Model
{
	protected $table = 'newsletter_queue_store_link';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'queue_id' => 'int',
		'store_id' => 'int'
	];

	public function newsletter_queue()
	{
		return $this->belongsTo(NewsletterQueue::class, 'queue_id');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
