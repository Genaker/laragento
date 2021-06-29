<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Integration
 * 
 * @property int $integration_id
 * @property string $name
 * @property string $email
 * @property string|null $endpoint
 * @property int $status
 * @property int|null $consumer_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $setup_type
 * @property string|null $identity_link_url
 * 
 * @property OauthConsumer|null $oauth_consumer
 *
 * @package Laragento\Models
 */
class Integration extends Model
{
	protected $table = 'integration';
	protected $primaryKey = 'integration_id';

	protected $casts = [
		'status' => 'int',
		'consumer_id' => 'int',
		'setup_type' => 'int'
	];

	protected $fillable = [
		'name',
		'email',
		'endpoint',
		'status',
		'consumer_id',
		'setup_type',
		'identity_link_url'
	];

	public function oauth_consumer()
	{
		return $this->belongsTo(OauthConsumer::class, 'consumer_id');
	}
}
