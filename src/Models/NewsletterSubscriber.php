<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NewsletterSubscriber
 * 
 * @property int $subscriber_id
 * @property int|null $store_id
 * @property Carbon|null $change_status_at
 * @property int $customer_id
 * @property string|null $subscriber_email
 * @property int $subscriber_status
 * @property string|null $subscriber_confirm_code
 * 
 * @property Store|null $store
 * @property Collection|NewsletterProblem[] $newsletter_problems
 * @property Collection|NewsletterQueueLink[] $newsletter_queue_links
 *
 * @package Laragento\Models
 */
class NewsletterSubscriber extends Model
{
	protected $table = 'newsletter_subscriber';
	protected $primaryKey = 'subscriber_id';
	public $timestamps = false;

	protected $casts = [
		'store_id' => 'int',
		'customer_id' => 'int',
		'subscriber_status' => 'int'
	];

	protected $dates = [
		'change_status_at'
	];

	protected $fillable = [
		'store_id',
		'change_status_at',
		'customer_id',
		'subscriber_email',
		'subscriber_status',
		'subscriber_confirm_code'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function newsletter_problems()
	{
		return $this->hasMany(NewsletterProblem::class, 'subscriber_id');
	}

	public function newsletter_queue_links()
	{
		return $this->hasMany(NewsletterQueueLink::class, 'subscriber_id');
	}
}
