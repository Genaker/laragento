<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OauthConsumer
 * 
 * @property int $entity_id
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property string $name
 * @property string $key
 * @property string $secret
 * @property string|null $callback_url
 * @property string $rejected_callback_url
 * 
 * @property Integration $integration
 * @property Collection|OauthNonce[] $oauth_nonces
 * @property Collection|OauthToken[] $oauth_tokens
 *
 * @package Laragento\Models
 */
class OauthConsumer extends Model
{
	protected $table = 'oauth_consumer';
	protected $primaryKey = 'entity_id';

	protected $hidden = [
		'secret'
	];

	protected $fillable = [
		'name',
		'key',
		'secret',
		'callback_url',
		'rejected_callback_url'
	];

	public function integration()
	{
		return $this->hasOne(Integration::class, 'consumer_id');
	}

	public function oauth_nonces()
	{
		return $this->hasMany(OauthNonce::class, 'consumer_id');
	}

	public function oauth_tokens()
	{
		return $this->hasMany(OauthToken::class, 'consumer_id');
	}
}
