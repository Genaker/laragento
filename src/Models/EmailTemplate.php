<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EmailTemplate
 * 
 * @property int $template_id
 * @property string $template_code
 * @property string $template_text
 * @property string|null $template_styles
 * @property int|null $template_type
 * @property string $template_subject
 * @property string|null $template_sender_name
 * @property string|null $template_sender_email
 * @property Carbon $added_at
 * @property Carbon $modified_at
 * @property string|null $orig_template_code
 * @property string|null $orig_template_variables
 * @property bool $is_legacy
 *
 * @package Laragento\Models
 */
class EmailTemplate extends Model
{
	protected $table = 'email_template';
	protected $primaryKey = 'template_id';
	public $timestamps = false;

	protected $casts = [
		'template_type' => 'int',
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
		'added_at',
		'modified_at',
		'orig_template_code',
		'orig_template_variables',
		'is_legacy'
	];
}
