<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NewsletterQueue
 * 
 * @property int $queue_id
 * @property int $template_id
 * @property int|null $newsletter_type
 * @property string|null $newsletter_text
 * @property string|null $newsletter_styles
 * @property string|null $newsletter_subject
 * @property string|null $newsletter_sender_name
 * @property string|null $newsletter_sender_email
 * @property int $queue_status
 * @property Carbon|null $queue_start_at
 * @property Carbon|null $queue_finish_at
 * 
 * @property NewsletterTemplate $newsletter_template
 * @property Collection|NewsletterProblem[] $newsletter_problems
 * @property Collection|NewsletterQueueLink[] $newsletter_queue_links
 * @property Collection|Store[] $stores
 *
 * @package Laragento\Models
 */
class NewsletterQueue extends Model
{
	protected $table = 'newsletter_queue';
	protected $primaryKey = 'queue_id';
	public $timestamps = false;

	protected $casts = [
		'template_id' => 'int',
		'newsletter_type' => 'int',
		'queue_status' => 'int'
	];

	protected $dates = [
		'queue_start_at',
		'queue_finish_at'
	];

	protected $fillable = [
		'template_id',
		'newsletter_type',
		'newsletter_text',
		'newsletter_styles',
		'newsletter_subject',
		'newsletter_sender_name',
		'newsletter_sender_email',
		'queue_status',
		'queue_start_at',
		'queue_finish_at'
	];

	public function newsletter_template()
	{
		return $this->belongsTo(NewsletterTemplate::class, 'template_id');
	}

	public function newsletter_problems()
	{
		return $this->hasMany(NewsletterProblem::class, 'queue_id');
	}

	public function newsletter_queue_links()
	{
		return $this->hasMany(NewsletterQueueLink::class, 'queue_id');
	}

	public function stores()
	{
		return $this->belongsToMany(Store::class, 'newsletter_queue_store_link', 'queue_id');
	}
}
