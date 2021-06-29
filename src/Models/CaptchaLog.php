<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CaptchaLog
 * 
 * @property string $type
 * @property string $value
 * @property int $count
 * @property Carbon|null $updated_at
 *
 * @package Laragento\Models
 */
class CaptchaLog extends Model
{
	protected $table = 'captcha_log';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'count' => 'int'
	];

	protected $fillable = [
		'count'
	];
}
