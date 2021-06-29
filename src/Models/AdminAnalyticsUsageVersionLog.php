<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminAnalyticsUsageVersionLog
 * 
 * @property int $id
 * @property string $last_viewed_in_version
 *
 * @package Laragento\Models
 */
class AdminAnalyticsUsageVersionLog extends Model
{
	protected $table = 'admin_analytics_usage_version_log';
	public $timestamps = false;

	protected $fillable = [
		'last_viewed_in_version'
	];
}
