<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NewsletterProblem
 * 
 * @property int $problem_id
 * @property int|null $subscriber_id
 * @property int $queue_id
 * @property int|null $problem_error_code
 * @property string|null $problem_error_text
 * 
 * @property NewsletterQueue $newsletter_queue
 * @property NewsletterSubscriber|null $newsletter_subscriber
 *
 * @package Laragento\Models
 */
class NewsletterProblem extends Model
{
	protected $table = 'newsletter_problem';
	protected $primaryKey = 'problem_id';
	public $timestamps = false;

	protected $casts = [
		'subscriber_id' => 'int',
		'queue_id' => 'int',
		'problem_error_code' => 'int'
	];

	protected $fillable = [
		'subscriber_id',
		'queue_id',
		'problem_error_code',
		'problem_error_text'
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
