<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NewsletterTemplate
 * 
 * @property int $template_id
 * @property string|null $template_code
 * @property string|null $template_text
 * @property string|null $template_styles
 * @property int|null $template_type
 * @property string|null $template_subject
 * @property string|null $template_sender_name
 * @property string|null $template_sender_email
 * @property int|null $template_actual
 * @property Carbon|null $added_at
 * @property Carbon|null $modified_at
 * @property bool $is_legacy
 * 
 * @property Collection|NewsletterQueue[] $newsletter_queues
 *
 * @package Laragento\Models
 */
class NewsletterTemplate extends Model
{
	protected $table = 'newsletter_template';
	protected $primaryKey = 'template_id';
	public $timestamps = false;

	protected $casts = [
		'template_type' => 'int',
		'template_actual' => 'int',
		'is_legacy' => 'bool'
	];

	protected $dates = [
		'added_at',
		'modified_at'
	];

	protected $fillable = [
		'template_code',
		'template_text',
		'template_styles',
		'template_type',
		'template_subject',
		'template_sender_name',
		'template_sender_email',
		'template_actual',
		'added_at',
		'modified_at',
		'is_legacy'
	];

	public function newsletter_queues()
	{
		return $this->hasMany(NewsletterQueue::class, 'template_id');
	}
}
